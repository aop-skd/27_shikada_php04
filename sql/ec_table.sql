-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 2 月 02 日 22:57
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db4`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `ec_table`
--

CREATE TABLE `ec_table` (
  `id` int(12) NOT NULL,
  `item` varchar(64) NOT NULL,
  `value` int(6) NOT NULL,
  `category` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `fname` varchar(128) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `ec_table`
--

INSERT INTO `ec_table` (`id`, `item`, `value`, `category`, `description`, `fname`, `indate`) VALUES
(3, 'ナイルの庭', 10000, 'fragrance', 'シトラス系', 'imgrc0072689692.png', '2022-01-31 20:57:31'),
(6, 'ピカチュー', 50, 'character', 'かわいい', 'pikachu.png', '2022-01-31 21:46:44'),
(8, 'シャネル', 6000, 'fragrance', 'エレガント', '8848376856606.png', '2022-02-01 22:49:27'),
(14, '花のある生活', 100000000, 'furniture', 'すてきです', 'hana.png', '2022-02-02 21:34:20'),
(15, 'いす', 55555, 'furniture', '椅子です', 'isu.png', '2022-02-02 21:34:46'),
(16, 'Miss Dior', 6000, 'fragrance', '女子力高めです。', 'Y0326210_F032621889_E01_ZHC.png', '2022-02-02 21:46:16'),
(17, 'スヌーピー', 298140198, 'character', 'すぬーぴい', 'snoopy.png', '2022-02-02 21:55:11'),
(18, 'きれいなコート', 100000, 'fashion', 'Maxmaraのコート', 'maxmara.webp', '2022-02-02 22:44:14'),
(19, 'Diorのバッグ', 300000, 'fashion', 'PCもはいるトートバッグ', 'dior.png', '2022-02-02 22:47:58');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `ec_table`
--
ALTER TABLE `ec_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `ec_table`
--
ALTER TABLE `ec_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
