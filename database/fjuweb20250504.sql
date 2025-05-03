-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-05-03 18:47:55
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `fjuweb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dep_url`
--

CREATE TABLE `dep_url` (
  `id` int(100) NOT NULL,
  `dep` varchar(20) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `dep_url`
--

INSERT INTO `dep_url` (`id`, `dep`, `url`) VALUES
(1, '文學院', 'http://www.la.fju.edu.tw/'),
(2, '中國文學系', 'http://www.chinese.fju.edu.tw/index.php'),
(3, '歷史學系', 'http://www.history.fju.edu.tw/chi/'),
(4, '哲學系', 'https://www.philosophy.fju.edu.tw/'),
(5, '藝術學院', 'https://www.finearts.fju.edu.tw/zh/'),
(6, '音樂學系', 'https://www.music.fju.edu.tw/'),
(7, '景觀設計學系', 'https://www.landscape.fju.edu.tw/zh/'),
(8, '應用美術學系', 'https://www.aart.fju.edu.tw/'),
(9, '藝術與文化創意學士學位學程', 'http://culture.finearts.fju.edu.tw/layout/onebrown/vvindex.jsp'),
(10, '醫學院', 'http://www.mc.fju.edu.tw/'),
(11, '醫學系', 'http://www.med.fju.edu.tw/layout/onebrown/vvindex.jsp'),
(12, '護理學系', 'https://www.nursing.fju.edu.tw/'),
(13, '公共衛生學系', 'https://www.medph.fju.edu.tw/'),
(14, '臨床心理學系', 'http://www.cpsy.fju.edu.tw/layout/oneblue/vvindex.jsp'),
(15, '職能治療學系', 'http://www.ot.fju.edu.tw/layout/oneblue/vvindex.jsp'),
(16, '呼吸治療學系', 'http://www.drt.fju.edu.tw/layout/oneblue/vvindex.jsp'),
(17, '生物醫學暨藥學研究所', 'http://www.gibps.fju.edu.tw/index.php'),
(18, '跨專業長期照護碩士學位學程', 'http://tltc.fju.edu.tw/layout/oneblue/vvindex.jsp'),
(19, '生物醫學海量資料分析碩士學位學程', 'http://www.bdb.fju.edu.tw/tw/'),
(20, '生技醫藥博士學位學程', 'http://www.biopharma.fju.edu.tw/layout/oneblue/vvindex.jsp'),
(21, '傳播學院', 'http://www.comm.fju.edu.tw/'),
(22, '影像傳播學系', 'http://www.commarts.fju.edu.tw/'),
(23, '新聞傳播學系', 'http://jcs.fju.edu.tw/'),
(24, '廣告傳播學系', 'http://www.adpr.fju.edu.tw/'),
(25, '大眾傳播學研究所', 'http://www.gsmc.url.tw/?lang=TW'),
(26, '大眾傳播學士學位學程', 'http://www.fjumedia.com/c0g/'),
(27, '教育學院', 'http://www.educ.fju.edu.tw/'),
(28, '圖書資訊學系', 'http://www.lins.fju.edu.tw/'),
(29, '體育學系', 'https://www.phed.fju.edu.tw/'),
(30, '師資培育中心', 'http://www.cte.fju.edu.tw/'),
(31, '教育領導與發展研究所', 'http://www.lead.fju.edu.tw/'),
(32, '教育領導與科技發展學士學位學程', 'http://www.eltd.fju.edu.tw/'),
(33, '運動休閒管理學士學位學程', 'http://www.psrm.fju.edu.tw/'),
(34, '理工學院', 'http://www.se.fju.edu.tw/'),
(35, '數學系', 'http://www.math.fju.edu.tw/zh-hant/'),
(36, '物理學系', 'http://www.phy.fju.edu.tw/'),
(37, '化學系', 'http://www.ch.fju.edu.tw/layout/onebrown/vvindex.jsp'),
(38, '生命科學系', 'http://www.bio.fju.edu.tw/'),
(39, '資訊工程學系', 'http://www3.csie.fju.edu.tw/'),
(40, '電機工程學系', 'http://www.ee.fju.edu.tw/'),
(41, '醫學資訊與創新應用學士學位學程', 'http://www.miia.fju.edu.tw/layout/oneorange/vvindex.jsp'),
(42, '應用科學與工程研究所', 'http://www.ase.fju.edu.tw/layout/oneblue/vvindex.jsp'),
(43, '軟體工程與數位創意學士學位學程', 'http://www.sedia.fju.edu.tw/wordpress/'),
(44, '外國語文學院', 'http://www.cfl.fju.edu.tw/'),
(45, '英國語文學系', 'http://english.fju.edu.tw/'),
(46, '德語語文學系', 'http://www.de.fju.edu.tw/'),
(47, '法國語文學系', 'http://www.fren.fju.edu.tw/'),
(48, '西班牙語文學系', 'http://www.span.fju.edu.tw/'),
(49, '日本語文學系', 'http://www.jp.fju.edu.tw/layout/oneblue/vvindex.jsp'),
(50, '義大利語文學系', 'http://www.italy.fju.edu.tw/'),
(51, '跨文化研究所', 'https://giccs.fju.edu.tw/'),
(52, '民生學院', 'http://www.he.fju.edu.tw/'),
(53, '食品科學系', 'http://www.fs.fju.edu.tw/content/index.php'),
(54, '營養科學系', 'http://www.ns.fju.edu.tw/'),
(55, '兒童與家庭學系', 'http://www.cfs.fju.edu.tw/'),
(56, '餐旅管理學系', 'http://www.rhim.fju.edu.tw/'),
(57, '食品營養博士學位學程', 'https://fjunfsdoctor.tw.he.fju.edu.tw/'),
(58, '法律學院', 'http://www.ls.fju.edu.tw/'),
(59, '法律學系', 'http://www.laws.fju.edu.tw/'),
(60, '財經法律學系', 'http://www.financelaw.fju.edu.tw/'),
(61, '學士後法律學系', 'http://gd.laws.fju.edu.tw/'),
(62, '社會科學院', 'https://www.social.fju.edu.tw/'),
(63, '經濟學系', 'https://www.economics.fju.edu.tw/'),
(64, '社會學系', 'https://www.soci.fju.edu.tw/'),
(65, '社會工作學系', 'http://fjusw.tw/Web/'),
(66, '宗教學系', 'http://www.rsd.fju.edu.tw/index.php/zh/'),
(67, '心理學系', 'https://psy.fju.edu.tw'),
(68, '天主教研修學士學位學程', 'http://bpcs.fju.edu.tw/layout/oneblue/vvindex.jsp'),
(69, '非營利組織管理碩士學位學程', 'http://npo.social.fju.edu.tw/web/index/index.jsp?lang=tw'),
(70, '管理學院', 'http://www.management.fju.edu.tw/'),
(71, '資訊管理學系', 'http://www.im.fju.edu.tw/'),
(72, '金融與國際企業學系', 'http://www.fib.fju.edu.tw/'),
(73, '會計學系', 'http://www.management.fju.edu.tw/subweb/acct/subindex.php'),
(74, '企業管理學系', 'http://www.management.fju.edu.tw/subweb/mba/'),
(75, '統計資訊學系', 'http://www.stat.fju.edu.tw/'),
(76, '國際創業與經營管理學程碩士學位學程', 'http://www.management.fju.edu.tw/subweb/gemba/'),
(77, '商業管理學士學位學程', 'http://www.bbm.fju.edu.tw/'),
(78, '社會企業碩士在職學位學程', 'http://see.fju.edu.tw/'),
(79, '科技管理學程碩士在職學位學程', 'http://www.management.fju.edu.tw/subweb/technology/'),
(80, '商學研究所', 'http://www.management.fju.edu.tw/subweb/phdba/'),
(81, '國際經營管理碩士班', 'http://www.management.fju.edu.tw/subweb/immba/'),
(82, '織品學院', 'http://www.ft.fju.edu.tw/'),
(83, '織品服裝學系', 'https://www.tc.fju.edu.tw/'),
(84, '品牌與時尚經營管理碩士學位學程', 'https://www.bfm.fju.edu.tw/web/'),
(85, '博物館學研究所', 'http://www.museumstudies.fju.edu.tw/'),
(86, '進修部', 'http://www.soce.fju.edu.tw/wordpress/'),
(87, '人文社會服務進修學士學位學程', 'http://hss.fju.edu.tw/layout/onebrown/vvindex.jsp'),
(88, '長期照護與健康管理進修學士學位學程', 'http://ltchm.fju.edu.tw/layout/onebrown/vvindex.jsp'),
(89, '資訊創新與數位生活進修學士學位學程', 'http://iidl.fju.edu.tw/'),
(90, '室內設計進修學士學位學程', 'http://www.id.fju.edu.tw/layout/onebrown/vvindex.jsp'),
(91, '醫學資訊與健康科技進修學士學位學程', 'http://www.mih.fju.edu.tw/');

-- --------------------------------------------------------

--
-- 資料表結構 `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `event` varchar(500) NOT NULL,
  `modifier_id` int(11) DEFAULT NULL,
  `modify_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `history`
--

INSERT INTO `history` (`id`, `year`, `event`, `modifier_id`, `modify_time`) VALUES
(1, 1925, '由美國本篤會於北京創辦，初期設大學預科名為「北京公教大學附屬輔仁社」', 4, '2025-05-03 19:52:53'),
(2, 1927, '北洋政府准予試辦，並正式將校名改為「輔仁大學」，取《論語》:「以文會友，以友輔仁」之意', 1, '2025-04-22 13:21:54'),
(3, 1929, '國民政府統一全國後，董事會改組呈請教育部正式立案', 1, '2025-05-03 17:41:48'),
(4, 1933, '改由聖言會接辦', NULL, NULL),
(5, 1952, '因院系調整併入北京師範大學', NULL, NULL),
(6, 1956, '輔仁大學在臺校友會呼籲復校', NULL, NULL),
(7, 1959, '教宗若望二十三世任命于斌總主教為首任校長並籌備復校事宜。中國教區神職、聖言會及耶穌會共同參與復校計畫', NULL, NULL),
(8, 1960, '教育部核准進行籌設', NULL, NULL),
(9, 1961, '成立文學院\n哲學研究所招生，輔仁大學正式在台復校', NULL, NULL),
(10, 1963, '成立理學院\n成立法學院\n設立3學校10系組，大學部招生', NULL, NULL),
(11, 1969, '成立商學院\n成立夜間部', NULL, NULL),
(12, 1980, '成立外語學院', NULL, NULL),
(13, 1984, '成立藝術學院', NULL, NULL),
(14, 1990, '成立醫學院', NULL, NULL),
(15, 1994, '成立民生學院', NULL, NULL),
(16, 2003, '成立法律學院', NULL, NULL),
(17, 2010, '成立傳播學院\n成立教育學院', NULL, NULL),
(18, 2012, '捷運輔大站通車', NULL, NULL),
(19, 2017, '成立織品服裝學院\n附設醫院開幕', NULL, NULL),
(28, 2023, '輔大醫院晉升區域醫院', NULL, NULL),
(31, 2024, '教育學院更名為教育與運動健康學院', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `history_english`
--

CREATE TABLE `history_english` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `event` varchar(500) NOT NULL,
  `modifier_id` int(11) DEFAULT NULL,
  `modify_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `history_english`
--

INSERT INTO `history_english` (`id`, `year`, `event`, `modifier_id`, `modify_time`) VALUES
(1, 1925, 'Founded in Beijing by the Benedictines of the United States, the university preparatory course was initially named \"Furen Club Affiliated to Beijing Catholic University\".', NULL, NULL),
(2, 1927, 'The Beiyang government approved the trial operation, and officially changed the name of the school to \"Fu Jen Catholic University\", taking the meaning from \"The Analects of Confucius\": \"Make friends with literature, and help people with friends\".', NULL, NULL),
(3, 1929, 'After the national government unified the country, the board of directors reorganized and petitioned the Ministry of Education for formal filing.', NULL, NULL),
(4, 1933, 'The SVD Mission would take over.', NULL, NULL),
(5, 1952, 'Fu Jen was merged into Beijing Normal University due to the adjustment of departments.', NULL, NULL),
(6, 1956, 'Fu Jen Catholic University Alumni Association in Taiwan called for the resumption of the school', NULL, NULL),
(7, 1959, 'Pope John XXIII appointed Archbishop Yu Bin as the first principal and prepared for the resumption of the school. The Chinese diocesan clergy, the Sacred Word Society and the Jesuits jointly participated in the school restoration plan.', NULL, NULL),
(8, 1960, 'The Ministry of Education approved the establishment.', NULL, NULL),
(9, 1961, 'College of Liberal Arts was established.\r\nThe Institute of Philosophy recruits students, and Fu Jen Catholic University officially reopens in Taiwan.', NULL, NULL),
(10, 1963, 'College of Science and Engineering was established.\r\nCollege of Law was established.\r\nSet up 3 schools and 10 department groups, and recruit students from the university department.', NULL, NULL),
(11, 1969, 'College of Management was established.\r\nSchool of Continuing Education was established.', NULL, NULL),
(12, 1980, 'College of Foreign Languages & Literatures was established.', NULL, NULL),
(13, 1984, 'College of Arts was established.', NULL, NULL),
(14, 1990, 'College of Medicine was established.', NULL, NULL),
(15, 1994, 'College of Human Ecology was established.', NULL, NULL),
(16, 2010, 'College of Communication was established.\r\nCollege of Education was established.', NULL, NULL),
(17, 2012, 'Fu Jen University Station MRT opened to traffic.', NULL, NULL),
(18, 2017, 'College of Fashion & Textiles was established.\r\nOpening of Fu Jen Catholic University Hospital.', NULL, NULL),
(24, 2023, 'Fu Jen Catholic University Hospital promoted to Regional Hospital', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `member_table`
--

CREATE TABLE `member_table` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `permission` varchar(10) NOT NULL DEFAULT '使用者'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `member_table`
--

INSERT INTO `member_table` (`id`, `username`, `user`, `password`, `email`, `permission`) VALUES
(1, 'manager1', '', '$2y$10$K.GvA83EfokF2RJ3lEnOxORF0PfGF1byTQENDGLtYZwxOQdaJgopu', NULL, '管理者'),
(2, 'manager2', '', '$2y$10$u8cArxmb1LX.KKFIVrzQOeUvKq.ADx.jkyL2c/zXDrD.TlbLVLoxy', NULL, '管理者'),
(3, 'manager3', '', '$2y$10$pROKr8yQaiXgnar2CBrL0uvdZU3cOFkttZONVgBrAVL1mJhjlyYZG', NULL, '管理者'),
(4, 'manager4', '', '$2y$10$kI/GR6eA7wXUidPKXH2C0OFf/5rjM5YNHijpQLCTwJgZlJjbnGOJq', NULL, '管理者'),
(9, 'manager5', '陳芊卉', '$2y$10$4oZXxy15OtWdbabe6C8V9uc3.cyrHdElHG66OEAtofT8f.LmZ/hDy', 'chenqianhui4@gmail.com', '管理者'),
(13, 'test2', '陳芊卉', '$2y$10$dAuU5ux39Z/6q2PppFcIWOtBoxLZ/aysvTwwh38cN9lRIji9FsdZO', 'chenqianhui4@gmail.com', '使用者');

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `topnews` varchar(5) NOT NULL DEFAULT 'NO',
  `modifier_id` int(11) DEFAULT NULL,
  `modify_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `news`
--

INSERT INTO `news` (`id`, `title`, `link`, `date`, `topnews`, `modifier_id`, `modify_time`) VALUES
(1, ' 輔大築夢資訊網-輔大專屬高中生落點分析預測系統', 'http://140.136.202.95/fjudreamnetwork/head.php', '2024-02-27', 'YES', NULL, NULL),
(2, ' 輔仁大學112學年度申請入學備審資料準備指引', ' https://exam.fju.edu.tw/admission/86', '2023-02-24', 'NO', 1, '2025-05-03 17:34:38'),
(3, '112學年度運動成績優良學生單獨招生術科測驗細則', 'https://exam.fju.edu.tw/admission/101', '2023-02-15', 'NO', NULL, NULL),
(4, '「國際創業與經營管理碩士在職專班」112學年度線上招生說明會歡迎報名參加', 'https://exam.fju.edu.tw/admission/99', '2023-02-03', 'NO', NULL, NULL),
(5, '輔仁大學111學年度(日間部)寒假轉學生1階段第1梯次遞補名單', 'https://exam.fju.edu.tw/admission/89/announcement', '2023-01-17', 'NO', NULL, NULL),
(6, '輔仁大學112學年度進修學士班申請入學招生簡章', 'https://exam.fju.edu.tw/admission/103', '2023-01-12', 'NO', NULL, NULL),
(7, '輔仁大學112學年度運動成績優良學生單獨招生簡章', 'https://exam.fju.edu.tw/admission/101', '2023-01-12', 'NO', NULL, NULL),
(11, '112學年度「輔仁大學鼓勵學士班成績優異學生就讀碩士班獎學金」獲獎名單', 'https://api-gateway.fju.edu.tw/Admission/data/Bulletins/f28f8c40-1682-485f-a3b3-0ad9cd857c01.pdf', '2022-12-07', 'NO', NULL, NULL),
(13, '輔仁大學112學年度碩士班招生簡章', 'https://exam.fju.edu.tw/admission/95', '2022-11-29', 'NO', NULL, NULL),
(14, '輔仁大學 112 學年度碩士在職專班招生簡章', 'https://exam.fju.edu.tw/admission/93', '2022-10-28', 'NO', NULL, NULL),
(15, '輔仁大學111學年度進修學士班寒假轉學生招生簡章', 'https://exam.fju.edu.tw/admission/90', '2022-10-27', 'NO', NULL, NULL),
(16, '輔仁大學111學年度(日間部)寒假轉學生招生簡章', 'https://exam.fju.edu.tw/admission/89', '2022-10-27', 'NO', NULL, NULL),
(17, '輔仁大學2023年僑生及港澳生研究所單獨招生報名連結', 'https://exam.fju.edu.tw/admission/91', '2022-10-18', 'NO', NULL, NULL),
(18, '輔大2023世界大學排名全國第12 不只贏國立！「產學收入」居全球頂標之上', 'https://www.fju.edu.tw/focusDetail.jsp?focusID=1952&focusClassID=3', '2022-10-12', 'NO', NULL, NULL),
(19, '輔仁大學112學年度博士班暨碩士班甄試招生簡章', 'https://exam.fju.edu.tw/admission/84', '2022-09-27', 'NO', NULL, NULL),
(20, '輔仁大學2023僑生及港澳生研究所單獨招生(第一階段)簡章公告', 'https://api-gateway.fju.edu.tw/Admission/data/Bulletins/a49f2e6a-d19d-4265-8033-74af52bbf0c2.pdf', '2022-09-26', 'NO', NULL, NULL),
(21, '再創佳績! 輔大MGEM榮獲2022英國金融時報全球MiM排行第35名', 'https://www.fju.edu.tw/awardDetail.jsp?newsID=6959', '2022-09-23', 'NO', NULL, NULL),
(22, '輔仁大學112學年度學士班特殊選才招生簡章', 'https://exam.fju.edu.tw/admission/85', '2022-09-22', 'NO', NULL, NULL),
(23, '輔仁大學111學年度護理學系二年制在職專班招生簡章公告', 'https://api-gateway.fju.edu.tw/Admission/data/Bulletins/e419fe90-ae7d-4a11-8d6f-0ad0d14689fa.pdf', '2021-12-14', 'NO', NULL, NULL),
(24, '大學甄選入學委員會(中正大學)', 'https://www.cac.edu.tw/cacportal/index.php', '2021-01-18', 'NO', NULL, NULL),
(26, '112學年度『國際創業與經營管理碩士在職專班』招生說明會歡迎報名參加', 'https://exam.fju.edu.tw/admission/99/announcement', '2022-12-01', 'NO', NULL, NULL),
(27, '112學年度輔仁大學織品系碩士在職專班招生說明會，開始報名!', '查無相關公告', '2022-10-28', 'NO', NULL, NULL),
(28, '歡迎蒞臨「輔大金融碩士在職專班」-112學年度招生說明會', 'http://ems.fib.fju.edu.tw/index.php?action=ix-detail&id=116', '2022-10-26', 'NO', NULL, NULL),
(29, '輔大資管系碩士在職專班112學年度線上招生說明會', 'http://www.im.fju.edu.tw/site/?p=6736', '2022-10-26', 'NO', NULL, NULL),
(41, '輔仁大學112學年度博士班招生簡章', 'https://api-gateway.fju.edu.tw/Admission/data/Bulletins/6588a889-e970-41dc-b626-50071173fed1.pdf', '2023-03-10', 'NO', NULL, NULL),
(42, '輔仁大學112學年度申請入學第二階段甄試經濟不利學生入學考試補助申請', 'https://exam.fju.edu.tw/admission/86/announcement/50', '2023-03-09', 'NO', NULL, NULL),
(45, ' 輔仁大學112學年度申請入學及繁星醫學第二階段指定項目甄試考生須知', ' https://api-gateway.fju.edu.tw/Admission/data/Bulletins/619ccc26-09fb-4f5f-b15c-b148f68aecda.pdf', '2023-04-12', 'NO', NULL, NULL),
(48, ' 大學申請入學錄取本校正/備取生向甄選委員會登記就讀志願序', ' https://exam.fju.edu.tw/admission/86', '2023-06-08', 'NO', NULL, NULL),
(51, ' 天主教輔仁大學 112 學年度 天主教研修學士學位學程招生', ' https://exam.fju.edu.tw/admission/105', '2023-06-01', 'NO', NULL, NULL),
(55, ' 輔仁大學2023僑生及港澳生研究所(第二階段)單獨招生', ' https://exam.fju.edu.tw/admission/107', '2023-05-02', 'NO', NULL, NULL),
(56, ' 輔仁大學112學年度進修學士班考試入學招生', ' https://exam.fju.edu.tw/admission/111', '2023-06-12', 'NO', NULL, NULL),
(59, '  112 學年度大學分發入學招生', ' https://api-gateway.fju.edu.tw/Admission/data/Bulletins/50d65340-1303-47b6-aad8-98bfee205f5d.pdf', '2023-07-12', 'NO', NULL, NULL),
(65, '   輔仁大學113學年度學士班特殊選才招生簡章', '  https://exam.fju.edu.tw/admission/120/announcement', '2023-09-22', 'NO', NULL, NULL),
(66, '    天主教輔仁大學2024年僑生及港澳生單獨招生專區', '   https://exam.fju.edu.tw/admission/121/announcement', '2023-09-25', 'NO', NULL, NULL),
(67, '   輔仁大學113學年度博士班暨碩士班甄試招生簡章', '   https://exam.fju.edu.tw/admission/124/announcement', '2023-09-26', 'NO', NULL, NULL),
(68, ' 泰晤士高等教育特刊公布2024年度世界大學排名輔仁大學排名優於眾多國立大學', ' https://www.fju.edu.tw/focusDetail.jsp?focusID=2193&focusClassID=3', '2023-09-28', 'NO', NULL, NULL),
(69, ' 輔仁大學NPO管理×社會企業碩士在職專班聯合招生說明會', ' https://exam.fju.edu.tw/admission/125/announcement', '2023-10-20', 'NO', NULL, NULL),
(70, ' 輔仁大學113學年度「會計學系碩士在職專班」招生說明會', ' https://exam.fju.edu.tw/admission/125/announcement', '2023-10-20', 'NO', NULL, NULL),
(71, '  輔仁大學112學年度(日間部)寒假轉學生招生簡章', 'https://exam.fju.edu.tw/admission/129t', '2023-10-24', 'NO', NULL, NULL),
(72, ' 天主教輔仁大學 113學年度碩士在職專班招生簡章', ' https://exam.fju.edu.tw/admission/125/announcement', '2023-10-24', 'NO', NULL, NULL),
(73, ' 輔仁大學113學年度「科技管理碩士在職專班」招生說明會', ' https://exam.fju.edu.tw/admission/125/announcement', '2023-10-24', 'NO', NULL, NULL),
(74, '  113學年度輔仁大學織品服裝學系碩士在職專班招生說明會開跑囉', 'https://exam.fju.edu.tw/admission/125/announcement', '2023-10-24', 'NO', NULL, NULL),
(75, ' 輔仁大學113學年度統計資訊學系應用統計研究所碩士在職專班招生說明會', 'https://exam.fju.edu.tw/admission/125/announcement', '2023-10-27', 'NO', NULL, NULL),
(76, ' 輔仁大學113學年度「企業管理學系管理學碩士在職專班」招生說明會', 'https://exam.fju.edu.tw/admission/125/announcement', '2023-10-27', 'NO', NULL, NULL),
(77, '輔仁大學112學年度進修學士班寒假轉學生招生簡章', 'https://exam.fju.edu.tw/admission/128', '2023-10-26', 'NO', NULL, NULL),
(78, ' 113學年度輔仁大學哲學系碩士在職專班招生說明會，歡迎報名參加', ' https://exam.fju.edu.tw/admission/125/announcement', '2023-10-27', 'NO', NULL, NULL),
(79, '【輔大大傳所碩專班 招生講座 】 成為跨領域人才 大傳所碩專班正適合你', 'https://exam.fju.edu.tw/admission/125/announcement', '2023-10-27', 'NO', NULL, NULL),
(80, ' 專業X品質X人脈 三大保證【輔仁大學管理學院碩士在職班】招生說明會', ' https://exam.fju.edu.tw/admission/125/announcement', '2023-10-31', 'NO', NULL, NULL),
(81, '2024/1/20國際創業與經營管理碩士在職專班招生說明會歡迎報名參加', 'https://exam.fju.edu.tw/admission/125/announcement', '2023-11-24', 'NO', NULL, NULL),
(82, '輔仁大學 113學年度碩士班招生簡章', 'https://exam.fju.edu.tw/admission/131/announcement', '2023-11-28', 'NO', NULL, NULL),
(83, '輔仁大學113學年度學士班特殊選才招生錄取名單', 'https://exam.fju.edu.tw/admission/120/announcement', '2023-12-05', 'NO', NULL, NULL),
(84, '輔仁大學113學年度博士班暨碩士班甄試招生錄取名單', 'https://exam.fju.edu.tw/admission/124/announcement', '2023-12-06', 'NO', NULL, NULL),
(85, '輔仁大學113學年度運動成績優良學生單獨招生簡章', 'https://exam.fju.edu.tw/admission/132/announcement', '2024-01-12', 'NO', NULL, NULL),
(86, '輔仁大學 113 學年度國際創業與經營管理碩士學位學程在職專班招生簡章', 'https://exam.fju.edu.tw/admission/126/announcement', '2024-01-12', 'NO', NULL, NULL),
(87, '輔仁大學112學年度大學繁星推薦入學招生 - 各學群校系錄取標準一覽表', 'https://exam.fju.edu.tw/admission/118/announcement', '2024-02-27', 'NO', NULL, NULL),
(88, '輔仁大學112學年度大學申請入學招生各校系篩選標準及分發標準一覽表', 'https://exam.fju.edu.tw/admission/117/announcement', '2024-02-27', 'NO', NULL, NULL),
(89, '2024 輔仁跨域遊樂趣．探索無限∞-open day活動', 'https://exam.fju.edu.tw/newslist/page/535', '2024-02-27', 'NO', NULL, NULL),
(90, '《大學品牌力》十指標評比百校！成大居首，前十名輔大唯一私校', 'https://blog.104.com.tw/104data-university-brand/', '2024-02-29', 'NO', NULL, NULL),
(91, '輔仁大學113學年度申請入學備審資料準備指引', ' https://exam.fju.edu.tw/guide?admissionCategoryBaseSn=117', '2024-03-01', 'NO', NULL, NULL),
(92, '輔仁大學113學年度進修學士班申請入學招生簡章', 'https://exam.fju.edu.tw/admission/144/announcement', '2024-03-08', 'NO', NULL, NULL),
(93, '天主教輔仁大學113 學年度學士後護理學系招生簡章', 'https://exam.fju.edu.tw/admission/143/announcement', '2024-03-11', 'NO', NULL, NULL),
(94, '輔仁大學113學年度學系申請入學備審資料準備指引暨注意事項', ' https://exam.fju.edu.tw/guide?admissionCategoryBaseSn=117', '2024-03-28', 'NO', NULL, NULL),
(95, '輔仁大學113學年度(日間部)轉學生招生簡章', 'https://exam.fju.edu.tw/admission/147/announcement', '2024-04-23', 'NO', NULL, NULL),
(96, '輔仁大學113學年度進修學士班轉學生招生簡章', 'https://exam.fju.edu.tw/admission/141/announcement', '2024-04-23', 'NO', NULL, NULL),
(97, '天主教輔仁大學113學年度學士後法律學系招生錄取名單', 'https://exam.fju.edu.tw/admission/140/announcement', '2024-05-28', 'NO', NULL, NULL),
(98, '天主教輔仁大學113學年度國際創業與經營管理碩士學位學程在職專班招生錄取名單', 'https://exam.fju.edu.tw/admission/126/announcement', '2024-05-28', 'NO', NULL, NULL),
(99, '天主教輔仁大學113學年度博士班招生錄取名單', 'https://exam.fju.edu.tw/admission/139/announcement', '2024-05-29', 'NO', NULL, NULL),
(100, '天主教輔仁大學113學年度學士後護理學系招生錄取名單', 'https://exam.fju.edu.tw/admission/143/announcement', '2024-06-04', 'NO', NULL, NULL),
(101, '天主教輔仁大學113學年度學士後多元專長培力課程招生簡章', 'https://api-gateway.fju.edu.tw/Admission/data/Bulletins/528e8532-9143-4e53-a7b0-e4ad0330a4ca.pdf', '2024-05-28', 'NO', NULL, NULL),
(102, '天主教輔仁大學113學年度進修學士班甄審登記入學招生簡章', 'https://exam.fju.edu.tw/admission/145', '2024-04-29', 'NO', NULL, NULL),
(103, '天主教輔仁大學113學年度大學申請入學招生統一分發結果', 'https://www.cac.edu.tw/CacLink/apply113/113appLy_F3gh9Yd_EntraNce_D95pE3ta/html_entrance_77Gf9Kw2/result_html/result_apply/web/020.htm', '2024-06-13', 'NO', NULL, NULL),
(104, '天主教輔仁大學 113學年度進修學士班申請入學招生錄取名單', 'https://exam.fju.edu.tw/admission/144/announcement', '2024-06-18', 'NO', NULL, NULL),
(106, '輔仁大學114學年度學士班特殊選才招生簡章', 'https://exam.fju.edu.tw/admission/161/announcement', '2024-09-12', 'NO', NULL, NULL),
(107, '輔仁大學114學年度博士班暨碩士班甄試招生簡章', '   https://exam.fju.edu.tw/admission/162/announcement', '2024-09-18', 'NO', NULL, NULL),
(108, '天主教輔仁大學113學年度(日間部)寒假轉學生招生簡章', 'https://exam.fju.edu.tw/admission/169/announcement', '2024-10-24', 'NO', NULL, NULL),
(109, '【大傳所碩專班招生講座】｜ 說明會+ 講座課程', 'https://exam.fju.edu.tw/admission/168/announcement', '2024-10-23', 'NO', NULL, NULL),
(110, '【宗教學系碩士在職專班招生說明會】', 'https://exam.fju.edu.tw/admission/168/announcement', '2024-10-24', 'NO', NULL, NULL),
(111, ' 114學年度輔仁大學哲學系碩士在職專班招生說明會，歡迎報名參加!', ' https://exam.fju.edu.tw/admission/168/announcement', '2024-10-24', 'NO', NULL, NULL),
(112, ' ColleGo!大學選才與高中育才輔助系統', ' https://collego.edu.tw/Highschool/School?school=020', '2024-11-08', 'NO', NULL, NULL),
(113, '輔仁大學114學年度學士班特殊選才招生錄取名單', 'https://exam.fju.edu.tw/admission/161/announcement', '2024-11-25', 'NO', NULL, NULL),
(114, '輔仁大學114學年度博士班暨碩士班甄試招生錄取名單', 'https://exam.fju.edu.tw/admission/162/announcement', '2024-11-25', 'NO', NULL, NULL),
(115, '2025/01/11「國際創業與經營管理碩士在職專班」114學年度招生說明會及創新創業專題演講', 'https://exam.fju.edu.tw/admission/168/announcement', '2024-11-25', 'NO', NULL, NULL),
(116, ' 輔大連兩年獲104《最佳大學品牌力》 全國十強 ​ 私校第一', ' https://travellerlink.fju.edu.tw/Admission/data/Bulletins/6e7d8c55-12d1-4c9a-bc68-35e5a9e335ab.mp4', '2025-02-27', 'YES', NULL, NULL),
(117, ' 2025/3/8  輔大開箱日-學系薈萃．百年風華', ' http://140.136.202.95/fjuweb/open.html', '2025-02-27', 'NO', NULL, NULL),
(118, '輔仁大學114學年度申請入學備審資料準備指引', 'https://exam.fju.edu.tw/guide?admissionCategoryBaseSn=174', '2025-03-03', 'NO', NULL, NULL),
(119, '輔仁大學114學年度碩士班招生甲類系所錄取名單', 'https://exam.fju.edu.tw/admission/172/announcement', '2025-03-11', 'NO', NULL, NULL),
(120, '輔仁大學114學年度碩士班招生乙類系所初試合格名單', 'https://exam.fju.edu.tw/admission/172/announcement', '2025-03-11', 'NO', NULL, NULL),
(121, '輔仁大學114學年度碩士在職專班招生錄取名單', 'https://exam.fju.edu.tw/admission/168/announcement', '2025-03-12', 'NO', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `url_changes`
--

CREATE TABLE `url_changes` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `dep_id` int(11) DEFAULT NULL,
  `old_url` varchar(100) NOT NULL,
  `new_url` varchar(100) NOT NULL,
  `change_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `url_changes`
--

INSERT INTO `url_changes` (`id`, `user_id`, `dep_id`, `old_url`, `new_url`, `change_time`) VALUES
(1, '鄭亘妤', 1, 'http://www.la.fju.edu.tw/', 'http://www.la.fju.edu.tw//', '2025-04-18 16:57:57'),
(2, '鄭亘妤', 1, 'http://www.la.fju.edu.tw//', 'http://www.la.fju.edu.tw/', '2025-04-18 16:58:06'),
(3, '鄭亘妤', 1, 'http://www.la.fju.edu.tw/', 'http://www.la.fju.edu.tw//', '2025-05-03 17:34:11'),
(4, '鄭亘妤', 1, 'http://www.la.fju.edu.tw//', 'http://www.la.fju.edu.tw/', '2025-05-03 17:34:15'),
(5, '', 1, 'http://www.la.fju.edu.tw/', 'http://www.la.fju.edu.tw//', '2025-05-03 19:24:46'),
(6, '', 1, 'http://www.la.fju.edu.tw//', 'http://www.la.fju.edu.tw/', '2025-05-03 19:24:50'),
(7, '陳芊卉', 1, 'http://www.la.fju.edu.tw/', 'http://www.la.fju.edu.tw//', '2025-05-03 19:25:19'),
(8, '陳芊卉', 1, 'http://www.la.fju.edu.tw//', 'http://www.la.fju.edu.tw/', '2025-05-03 19:25:23');

-- --------------------------------------------------------

--
-- 資料表結構 `video_url`
--

CREATE TABLE `video_url` (
  `id` int(11) NOT NULL,
  `url` varchar(500) NOT NULL,
  `modifier_id` int(11) DEFAULT NULL,
  `modify_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `video_url`
--

INSERT INTO `video_url` (`id`, `url`, `modifier_id`, `modify_time`) VALUES
(1, 'https://www.youtube.com/embed/videoseries?list=PLtTsVUvyUQleoKfyaXpB8GQuGYhuuoiBk&autoplay=1&mute=1&loop=1', NULL, NULL),
(2, 'https://www.youtube.com/embed/videoseries?list=PLtTsVUvyUQleoKfyaXpB8GQuGYhuuoiBk&autoplay=1&mute=1&loop=1', 1, '2025-04-18 16:57:39');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `dep_url`
--
ALTER TABLE `dep_url`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `history_english`
--
ALTER TABLE `history_english`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member_table`
--
ALTER TABLE `member_table`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `url_changes`
--
ALTER TABLE `url_changes`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `video_url`
--
ALTER TABLE `video_url`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `dep_url`
--
ALTER TABLE `dep_url`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `history_english`
--
ALTER TABLE `history_english`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member_table`
--
ALTER TABLE `member_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `url_changes`
--
ALTER TABLE `url_changes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `video_url`
--
ALTER TABLE `video_url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
