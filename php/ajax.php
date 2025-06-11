<?php
  include('connect.php');

  // 初始化變數
  $title = isset($_GET['title']) ? trim($_GET['title']) : '';

  echo "<table border='1' style='width:85%'>
        查詢結果
        <tr>
          <th>消息</th>
          <th>日期</th>
        </tr>";

  if ($title !== "") {
    // 使用預處理語句避免 SQL Injection
    $stmt = $mysqli->prepare("SELECT title, date, link FROM news WHERE title LIKE CONCAT('%', ?, '%') ORDER BY id DESC");
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $result = $stmt->get_result();

    // 顯示結果
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td><a href=\"" . htmlspecialchars($row['link']) . "\">" . htmlspecialchars($row['title']) . "</a></td>";
      echo "<td>" . htmlspecialchars($row['date']) . "</td>";
      echo "</tr>";
    }

    $stmt->close();
  }

  echo "</table>";

  // 關閉資料庫連線（可選）
  // $mysqli->close();
?>
