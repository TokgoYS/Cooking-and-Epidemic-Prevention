-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-06-27 11:46:32
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db_c108193104`
--
CREATE DATABASE IF NOT EXISTS `db_c108193104` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_c108193104`;

-- --------------------------------------------------------

--
-- 資料表結構 `applys`
--

CREATE TABLE `applys` (
  `aNo` int(11) NOT NULL,
  `aDate` date NOT NULL,
  `aTime` time NOT NULL,
  `aContact` varchar(20) NOT NULL,
  `reply_jNo` int(11) NOT NULL,
  `reply_mNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `applys`
--

INSERT INTO `applys` (`aNo`, `aDate`, `aTime`, `aContact`, `reply_jNo`, `reply_mNo`) VALUES
(34, '2021-06-14', '03:00:00', '0954-662-826', 3, 41),
(35, '2021-12-28', '19:00:00', '0934-840-562', 10, 35),
(36, '2021-06-30', '14:00:00', '0924-666-852', 7, 37),
(37, '2021-06-16', '20:00:00', '0945-256-862', 4, 38),
(39, '2021-05-19', '18:00:00', '0912-224-638', 8, 40),
(40, '2021-05-19', '16:00:00', '0985-664-893', 2, 42),
(41, '2021-05-18', '16:00:00', '0936-332-674', 1, 43),
(42, '2021-02-23', '17:00:00', '0986-625-458', 9, 44),
(43, '2021-02-19', '19:00:00', '0963-528-943', 6, 45),
(44, '2021-01-10', '21:00:00', '0952-987-856', 5, 46),
(45, '2021-09-30', '20:30:00', '0963-987-365', 53, 49),
(46, '2021-08-15', '14:30:00', '0925-665-425', 52, 39),
(47, '2021-04-29', '11:30:00', '0985-624-846', 54, 47),
(48, '2021-04-21', '09:00:00', '0985-632-412', 51, 50),
(49, '2021-03-06', '04:30:00', '0925-863-841', 50, 48);

-- --------------------------------------------------------

--
-- 資料表結構 `journal`
--

CREATE TABLE `journal` (
  `jNo` int(11) NOT NULL,
  `jDate` datetime DEFAULT current_timestamp(),
  `jDish` varchar(30) NOT NULL,
  `jDifficulty` varchar(10) NOT NULL,
  `jStuff` varchar(50) NOT NULL,
  `jRemarks` text DEFAULT NULL,
  `jPhoto_name` varchar(64) NOT NULL,
  `jPhoto_filename` varchar(64) NOT NULL,
  `j_mId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `journal`
--

INSERT INTO `journal` (`jNo`, `jDate`, `jDish`, `jDifficulty`, `jStuff`, `jRemarks`, `jPhoto_name`, `jPhoto_filename`, `j_mId`) VALUES
(1, '2021-05-10 05:23:17', '梅干控肉', '中等', '五花肉片、梅干菜、蒜頭、甘草梅子粉、八角、醬油、香菇素蠔油、米酒、糖、胡椒粉、五香粉。', '筍絲控肉完美的搭配，滋味一級棒！', '梅干控肉.jpg', '60d7323c9d38d.jpg', 35),
(2, '2021-05-15 07:11:08', '翡翠海鮮羹', '中等', '茼蒿、乾干貝、蛤蜊、蝦、蛋、玉米粉、鹽。', '歡迎大家來跟我一起學習哦！', '翡翠海鮮羹.jpg', '60d7311f670a4.jpg', 38),
(3, '2021-06-10 15:24:13', '獅子頭', '高等', '豬絞肉、茡薺、大白菜 、紅蘿蔔、青蔥、乾香菇 、香菜 、醬油、蠔油、鹽、糖、紹興酒、白胡椒粉、太白粉', '我喜歡做料理，快來跟我一起做一起吃吧~', '獅子頭.jpg', '60d7339d2a5ad.jpg', 45),
(4, '2021-06-12 13:26:15', '銀絲卷', '低等', '牛奶、糖、乾酵母粉、中筋麵粉、鹽、油、南瓜粉。', '用氣炸鍋做的銀絲卷奶香、外酥、內軟～～～不油膩！', '銀絲卷.jpg', '60d72fc476ab7.jpg', 50),
(5, '2021-01-01 12:01:08', '魚香茄子', '低等', '茄子、絞肉、蔥、薑絲、蒜頭、辣椒、醬油、米酒、香油、太白粉。', '茄子屬於高營養密度的食物，富含纖維及各種維生素，雖然很多人討厭茄子！做成魚香茄子應該會很受歡迎～很下飯！', '魚香茄子.jpg', '60d73254b7f83.jpg', 40),
(6, '2021-02-15 15:11:08', '金沙雞蛋豆腐', '中等', '雞蛋豆腐、鹹蛋、蒜頭、蔥、辣椒、胡椒粉。', '表皮煎的金黃，外酥內軟的雞蛋豆腐，用鹹蛋黃炒製的金沙醬完整包裹，鹹香開胃，非常下飯！', '金沙雞蛋豆腐.jpg', '60d7324d48967.jpg', 37),
(7, '2021-06-28 07:31:28', '涼拌蒜香秋葵', '低等', '蒜末、醬油膏、醋、鹽巴、砂糖。', '秋葵最好吃的做法，毫無保留與大家分享。', '涼拌蒜香秋葵.jpg', '60d72fba5dda8.jpg', 39),
(8, '2021-05-16 02:01:12', '煎雞蛋豆腐', '中等', '雞蛋豆腐、蒜頭、綠蔥、醬油、辣油、油。', '整體很好吃下飯，吃的同時，每一口還吃到雞蛋豆腐的軟香。', '煎雞蛋豆腐.jpg', '60d73115ab4b8.jpg', 42),
(9, '2021-02-19 06:12:19', '奶香明太子炒馬鈴薯', '中等', '馬鈴薯、蒜末、鹽巴、黑胡椒、明太子粉、鮮奶油、蔥花。', '前陣子做生乳捲時買的生乳捲沒用完，懶得燉馬鈴薯奶油濃湯，所以就拿來拌炒，沒想到意外的好吃。', '奶香明太子炒馬鈴薯.jpg', '60d7324604584.jpg', 46),
(10, '2021-12-15 20:18:20', '香炒紅薯粉條', '中等', '紅薯粉條、高麗菜、香菇、肉末、蔥、蒜、辣椒、豆瓣醬。', '家常香炒紅薯粉條最好吃的做法，營養豐富，比吃肉還香，做法很簡單哦!', '香炒紅薯粉條.jpg', '60d72de4e72a4.jpg', 48),
(50, '2021-03-05 10:19:57', '蝦仁滑蛋', '低等', '蝦仁、蔥花、雞蛋、牛奶、白胡椒粉、鹽巴。', 'Q彈的蝦仁搭配順口的滑蛋，最後畫龍點睛的蔥花，完美。', '蝦仁滑蛋.jpg', '60d7e04dcb715.jpg', 41),
(51, '2021-04-17 10:25:00', '南瓜濃湯', '中等', '南瓜、無鹽奶油、牛奶、洋蔥、堅魚粉、胡椒粉。\r\n', '濃厚的南瓜味濃湯，是你最好的選擇。', '南瓜濃湯.jpg', '60d7e17cbdbd9.jpg', 43),
(52, '2021-08-10 10:29:24', '炒青菜', '低等', '珂白菜、烹大師、紅蘿葡薄片、油、蒜末。', '用快煮鍋加熱快，做水油炒青菜，快速又方便！', '炒青菜.jpg', '60d7e28452aaf.jpg', 44),
(53, '2021-09-27 10:34:22', '油悶桂竹筍', '中等', '燙過的桂竹筍、醬油、辣椒、香菇素蠔油、大蒜、糖。', '下酒下飯超好配菜，吃熱的吃冷的都好吃!', '油悶桂竹筍.jpg', '60d7e3ae05785.jpg', 47),
(54, '2021-04-26 10:38:27', '蕃茄鯖魚豆腐湯', '中等', '茄汁魚罐頭、洋蔥、雞蛋、黑胡椒粉、蕃茄、豆腐、\r\n蔥花。', '這道湯品做法簡單，是可以單吃或是搭配麵包等澱粉類主食一起享用的極簡輕食哦！', '蕃茄鯖魚豆腐湯.jpg', '60d7e4a3cf5f9.jpg', 49);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `mNo` int(5) NOT NULL,
  `mName` varchar(20) NOT NULL,
  `mId` varchar(10) NOT NULL,
  `mSex` varchar(1) NOT NULL,
  `mPhone` varchar(15) NOT NULL,
  `mBirthday` date NOT NULL,
  `mAddress` varchar(50) NOT NULL,
  `mEmail` varchar(50) NOT NULL,
  `mJob` varchar(10) NOT NULL,
  `mAccount` varchar(20) NOT NULL,
  `mPassword` varchar(20) NOT NULL,
  `mNickname` varchar(20) NOT NULL,
  `mProfile` text NOT NULL,
  `mJoinDate` date DEFAULT NULL,
  `mPhoto_name` varchar(64) NOT NULL,
  `mPhoto_filename` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`mNo`, `mName`, `mId`, `mSex`, `mPhone`, `mBirthday`, `mAddress`, `mEmail`, `mJob`, `mAccount`, `mPassword`, `mNickname`, `mProfile`, `mJoinDate`, `mPhoto_name`, `mPhoto_filename`) VALUES
(35, '張于婷', 'D294702571', '男', '1963-847-666', '1942-02-15', '台南市南區金華路一段150巷14號3樓', 'urodfficjf@iubridge.com', '高中老師', 'love12385', '95t24qycaa', '婷婷', '成功就是簡單的事情不斷地重複做。', '2001-06-14', '1.jpg', '60d5e64d1b7e8.jpg'),
(37, '吳思妤', 'A240076689', '女', '0925-863-942', '1963-06-08', '台北市信義區吳興街170巷16號', 'jdhuextbhv@iubridge.com', '設計師', 'gana7a8ab', 'xxc2ehzr1', '思思', '你不一定要很厲害，才能開始；但你要開始，才能很厲害。', '1986-01-18', '2.jpg', '60d7198f4da8a.jpg'),
(38, '蔡必妃', 'H209216719', '女', '0945-256-862', '2001-08-30', '桃園市桃園區慈文路149巷16號3樓', 'mdgzuwryfy@iubridge.com', '美甲師', 'evkt7n4gu', '9pw9e8q81', '妃妃', '記住你的價值，它不因外觀的不雅而貶值，是金子總有發光的一天。', '1962-05-16', '3.jpg', '60d71a24759a4.jpg'),
(39, '高寶韋', 'G169032227', '男', '0925-665-425', '1968-10-17', '宜蘭縣宜蘭市南橋路238號', 'khqjijvyie@iubridge.com', '水電工', 'fkjyyhwkna', 'y4j9nchcx', '小寶', '沒有退路時，潛能就發揮出來了。', '1954-08-13', '4.jpg', '60d71b143930d.jpg'),
(40, '趙志文', 'N153940526', '男', '0912-224-638', '1909-10-11', '彰化縣福興鄉福工路280號', 'ixqpohpsrs@iubridge.com', '建築師', '9hbsjyfdp', 's98uudtzs', '小文', '永不言敗，是成功者的最佳品格。', '1996-05-10', '5.jpg', '60d71b8969aa6.jpg'),
(41, '王雅月', 'B140795428', '女', '0954-662-826', '1984-06-21', '台中市南屯區大墩路55號', 'avsematlau@iubridge.com', '廚師', 'rqxzf74rg', 'iba26ac8f', '小雅月', '如果你向神求助，說明你相信神的能力；如果神沒有幫助你，說明神相信你的能力。', '1962-07-10', '6.jpg', '60d71c0f4f947.jpg'),
(42, '封家佑', 'J164988057', '男', '0985-664-893', '2001-06-11', '新竹縣橫山鄉中豐路一段78號', 'upxcgwptju@iubridge.com', '學生', 'ag62chvs2', 'c763v5rnc', '小佑', '要成功，先發瘋，頭腦簡單向前衝。', '1987-07-17', '7.jpg', '60d71c7cd16b4.jpg'),
(43, '施學利', 'E176997900', '男', '0936-332-674', '1913-01-15', '高雄市左營區重愛路109號', 'viwlyrxwzf@iubridge.com', '業務員', '532s8zpxn', 'cf4zvfabx', '利利', '擁有夢想只是一種智力，實現夢想才是一種能力。', '1945-04-11', '8.jpg', '60d71d014bff7.jpg'),
(44, '黃國民', 'F100200443', '男', '0986-625-458', '1992-06-09', '新北市新店區安忠路14號', 'bboeltkoit@iubridge.com', '寶石鑑定師', '4xzdf7prw', 'ipujygwik', '小民', '人生只有走出來的美麗，沒有等出來的輝煌。', '1985-02-04', '9.jpg', '60d71f2e80ead.jpg'),
(45, '江欣潔', 'I279859444', '女', '0963-528-943', '1977-06-13', '嘉義市東區興安街181巷3號6樓', 'dkhwtmyeiv@iubridge.com', '美髮師', 'mjje8cgnw', 'r5ytkug5f', '欣欣', '人生就像騎腳踏車，想保持平衡就得往前走。', '1965-03-24', '10.jpg', '60d71fb74a3bb.jpg'),
(46, '林雅云', 'D297239744', '女', '0952-987-856', '1970-07-15', '台南市善化區環東路二段19號', 'niuvlpshzq@iubridge.com', '工程師', 'etnav2q28', 'zs8vk4mkd', '小云', '一個人的夢想也許不值錢，但一個人的努力很值錢。', '1985-08-18', '11.jpg', '60d7205b0c85a.jpg'),
(47, '張瑞合', 'J196395737', '男', '0985-624-846', '1986-10-16', '新竹縣湖口鄉勝利路二段21巷16號5樓', 'ywfynyvwmo@iubridge.com', '電影導演', 'gxtn9nwxj', 'rwmm3vghh', '瑞瑞', '在真實的生命里，每樁偉業都由信心開始，並由信心跨出第一步。', '1912-04-13', '12.jpg', '60d720cfa70c0.jpg'),
(48, '王宛蓉', 'A229920075', '女', '0925-863-841', '1991-09-11', '台北市松山區長安東路二段79巷16號', 'wofuskelcb@iubridge.com', '護士', 'xq3w6u7u9', 'nwt3xtb88', '芙蓉', '積極向上的心態，是成功者的最基本要素。', '1945-06-10', '13.jpg', '60d72169cd326.jpg'),
(49, '倪欣怡', 'E273982409', '女', '0963-987-365', '1985-05-09', '高雄市苓雅區廣州一街27巷4號', 'vdnndhlppo@iubridge.com', '會計師', 'tcntywchu', 'w9qezts66', '欣怡', '強大的信心，能克服來自內心的惡魔，產生無往不勝的勇氣。', '1952-06-04', '14.jpg', '60d721deb988b.jpg'),
(50, '高建霖', 'K176602232', '男', '0985-632-412', '1993-06-10', '苗栗縣苗栗市至公路22號', 'lragmsnwgi@iubridge.com', '健身教練', 'kbcpnhe8t', 'em8ryst99', '小霖', '一個人只有在全力以赴的時候才能發揮最大的潛能。', '1925-02-21', '15.jpg', '60d722df77e3d.jpg');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `applys`
--
ALTER TABLE `applys`
  ADD PRIMARY KEY (`aNo`);

--
-- 資料表索引 `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`jNo`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mNo`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `applys`
--
ALTER TABLE `applys`
  MODIFY `aNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `journal`
--
ALTER TABLE `journal`
  MODIFY `jNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `mNo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
