"use strict";

(function () {
  // 宣告變數
  var timeline = document.querySelector(".timeline ol"),
      elH = document.querySelectorAll(".timeline li > div"),
      arrows = document.querySelectorAll(".timeline .arrows .arrow"),
      arrowPrev = document.querySelector(".timeline .arrows .arrow__prev"),
      arrowNext = document.querySelector(".timeline .arrows .arrow__next"),
      firstItem = document.querySelector(".timeline li:first-child"),
      lastItem = document.querySelector(".timeline li:last-child"),
      // 滑動的幅度
      xScrolling = 500,
      disabledClass = "disabled";

  //開始
  window.addEventListener("load", init);

  function init() {
    setEqualHeights(elH);
    animateTl(xScrolling, arrows, timeline);
    setSwipeFn(timeline, arrowPrev, arrowNext);
    setKeyboardFn(arrowPrev, arrowNext);
  }

  //設置等高
  function setEqualHeights(el) {
    var counter = 0;
    for (var i = 0; i < el.length; i++) {
      var singleHeight = el[i].offsetHeight;

      if (counter < singleHeight) {
        counter = singleHeight;
      }
    }

    for (var i = 0; i < el.length; i++) {
      el[i].style.height = counter + "px";
    }
  }

  //檢查元素是否在畫面中
  // http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
  function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return rect.top >= 0 && rect.left >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && rect.right <= (window.innerWidth || document.documentElement.clientWidth);
  }

  //設置上一個/下一個箭頭的狀態
  function setBtnState(el) {
    var flag = arguments.length <= 1 || arguments[1] === undefined ? true : arguments[1];

    if (flag) {
      el.classList.add(disabledClass);
    } else {
      if (el.classList.contains(disabledClass)) {
        el.classList.remove(disabledClass);
      }
      el.disabled = false;
    }
  }

  //動畫時間線
  function animateTl(scrolling, el, tl) {
    var counter = 0;
    for (var i = 0; i < el.length; i++) {
      el[i].addEventListener("click", function () {
        if (!arrowPrev.disabled) {
          arrowPrev.disabled = true;
        }
        if (!arrowNext.disabled) {
          arrowNext.disabled = true;
        }
        var sign = this.classList.contains("arrow__prev") ? "" : "-";
        if (counter === 0) {
          tl.style.transform = "translateX(-" + scrolling + "px)";
        } else {
          var tlStyle = getComputedStyle(tl);
          //如果需要在這裡添加更多瀏覽器前綴
          var tlTransform = tlStyle.getPropertyValue("-webkit-transform") || tlStyle.getPropertyValue("transform");
          var values = parseInt(tlTransform.split(",")[4]) + parseInt("" + sign + scrolling);
          tl.style.transform = "translateX(" + values + "px)";
        }

        setTimeout(function () {
          isElementInViewport(firstItem) ? setBtnState(arrowPrev) : setBtnState(arrowPrev, false);
          isElementInViewport(lastItem) ? setBtnState(arrowNext) : setBtnState(arrowNext, false);
        }, 1100);

        counter++;
      });
    }
  }

  //添加滑動設備
  function setSwipeFn(tl, prev, next) {
    var hammer = new Hammer(tl);
    hammer.on("swipeleft", function () {
      return next.click();
    });
    hammer.on("swiperight", function () {
      return prev.click();
    });
  }

  //添加基本鍵盤功能
  function setKeyboardFn(prev, next) {
    document.addEventListener("keydown", function (e) {
      if (e.which === 37 || e.which === 39) {
        var timelineOfTop = timeline.offsetTop;
        var y = window.pageYOffset;
        if (timelineOfTop !== y) {
          window.scrollTo(0, timelineOfTop);
        }
        if (e.which === 37) {
          prev.click();
        } else if (e.which === 39) {
          next.click();
        }
      }
    });
  }
})();