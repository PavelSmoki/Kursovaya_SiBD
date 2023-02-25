-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 13 2022 г., 01:53
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `portal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int UNSIGNED NOT NULL,
  `category_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Развлечения'),
(2, 'Наука и Технологии'),
(3, 'Спорт'),
(4, 'Киберспорт'),
(5, 'Культура');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `comment_id` int UNSIGNED NOT NULL,
  `post_id` int UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `comment_author` int UNSIGNED NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `text`, `comment_author`, `date`) VALUES
(18, 10, 'ВАУ', 20, '2022-12-11 20:03:11'),
(26, 10, 'Замечательно!', 21, '2022-12-11 20:07:07'),
(29, 9, 'Отличный вышел матч', 13, '2022-12-11 20:21:20'),
(30, 9, 'Полностью поддерживаю человека сверху!', 21, '2022-12-11 20:21:33'),
(31, 9, 'ВАУ', 21, '2022-12-11 20:21:41'),
(34, 9, 'УРААААА', 20, '2022-12-11 20:25:51'),
(40, 13, 'Вау', 13, '2022-12-11 20:56:58'),
(41, 16, 'Вау', 20, '2022-12-12 01:00:18'),
(42, 15, 'Невероятно', 20, '2022-12-12 01:00:27'),
(43, 12, 'Интересно', 20, '2022-12-12 01:03:56'),
(44, 18, 'ПЕРВЫЙ КОММЕНТАРИЙ', 21, '2022-12-12 16:52:36');

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `post_id` int UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_author` int UNSIGNED NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `picture` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`post_id`, `category_id`, `text`, `post_author`, `date`, `title`, `picture`) VALUES
(9, 3, 'Главный фаворит чемпионата мира по футболу в Катаре, сборная Бразилии, проиграла в серии пенальти четвертьфинальный матч со сборной Хорватии и покидает турнир.\r\n\r\nХорватия – Бразилия – 1:1 (4:2-пен)\r\n\r\nГолы: Неймар, 105+1 – Петкович, 116\r\n\r\nОсновное время матча закончилось вничью, несмотря на то, что перед поединком многие прогнозировали легкую победу сборной Бразилии. Тем не менее, хорваты на равных противостояли пентакампеонам и создавали острые моменты у ворот южноамериканцев не реже, чем бразильцы – у рамки Ливаковича.\r\n\r\nПервый гол в матче был забит лишь в самой концовке первого экстратайма – Неймар прошел через всю оборону сборной Хорватии, обыграл Ливаковича и забил свой 77-й гол за сборную Бразилии. По этому показателю он сравнялся с Пеле.\r\n\r\nПосле этого на трибунах возобновился притихший было южноамериканский карнавал, однако сборная Хорватии подтвердила свой статус цепкой и неуступчивой команды. Несмотря на то, что пентакампеоны начали совсем не по-бразильски тянуть время, Хорватия устроила настоящий штурм ворот соперников и на 116-й минуте Петкович сравнял счет в матче.\r\n\r\nВ серии пенальти вновь проявил себя голкипер хорватов Ливакович, парировавший первый же удар по своим воротам. Не забил Родриго. Хорваты били пенальти безупречно, а вот у бразильцев Маркиньос угодил в штангу. 4:2 по пенальти в пользу Хорватии и вся Бразилия погрузилась в траур.', 20, '2022-12-11 07:28:09', 'Сборная Бразилии покидает ЧМ-2022 после сенсационного поражения в четвертьфинале от Хорватии', 'https://i.imgur.com/Akug8La.png'),
(10, 2, 'Недавно Perseverance собрал первые образцы марсианского реголита. До сих пор марсоход бурил только скальные породы. Эти новые образцы могут стать ключом к пониманию геологических процессов, сформировавших Красную планету. Благодаря Perseverance однажды мы сможем ответить на ключевой вопрос: появилась ли когда-нибудь жизнь на Марсе? Чтобы выяснить это, марсоход работает в кратере Езеро, где когда-то находилось озеро, питаемое дельтой реки, в отложениях которого могли сохраниться микробные формы жизни. Основная задача Perseverance - сбор образцов и хранение их в пробирках. Затем они будут извлечены в ходе последующей миссии и возвращены на Землю в начале 2030-х годов. На данный момент марсоход собрал около 15 образцов горных пород. 2 и 6 декабря исследователи наконец-то занялись реголитом (измельченная горная порода в виде пыли), которую собрали с насыпи песка. Основные данные Помимо того, что они могут содержать признаки жизни, эти образцы реголита, вероятно, также позволят лучше понять геологические процессы, сформировавшие Марс. Их анализ также будет необходим для освоения Красной планеты человеком. Из лунного опыта мы знаем, что реголит может воздействовать на широкий спектр оборудования, от солнечных батарей до скафандров и дыхательных аппаратов космонавтов. Некоторые из этих пылевых зерен могут быть такими же мелкими, как соединения в сигаретном дыме. Кроме того, марсианский реголит может содержать перхлорат. Это токсичный химикат, который при вдыхании в больших количествах может представлять опасность для здоровья космонавтов. Также возможно, что марсианский реголит может стать важным ресурсом для миссий с экипажем, помогая защитить среду обитания от солнечной радиации.\r\nПо всем этим причинам было необходимо включить этот материал в коллекцию Perseverance. Через несколько лет ученые смогут более детально изучить его в лаборатории с помощью самых современных приборов. Что касается извлечения образцов, то к концу десятилетия планируется отправить посадочный аппарат в район под названием Три Форкс. Perseverance доставит пробирки с образцами на лендер, который затем будет помещен в небольшую ракету для вывода их на орбиту. Затем европейский орбитальный аппарат сможет извлечь их и отправить обратно на Землю. Если все пойдет по плану, образцы должны прибыть примерно в 2033 году.', 20, '2022-12-11 09:08:16', 'Perseverance собирает первые образцы марсианского грунта.', 'https://new-science.ru/wp-content/webp-express/webp-images/doc-root/wp-content/uploads/2022/12/54-4-scaled.jpg.webp'),
(12, 4, 'Снайпер OG Абдул degster Гасанов рассказал, что его команда вылетела на BLAST Premier: World Final 2022, который пройдет в Абу-Даби. Видеообращение киберспортсмена опубликовано в Telegram.\r\n«Летим на BLAST в Абу-Даби. Летим [авиакомпанией] Emirates и это потрясающе. Чтобы вы понимали, BLAST оплатил всем игрокам полеты бизнес-классом на BLAST Premier. Это круто»\r\nBLAST Premier: World Final 2022 пройдет с 14 по 18 декабря в Объединенных Арабских Эмиратах. Призовой фонд чемпионата составит миллион долларов. Помимо OG, на турнире выступят Virtus.pro, Natus Vincere, FaZe Clan, Heroic и другие коллективы. Ознакомиться с полным списком участников можно в репортаже.', 20, '2022-12-11 20:32:07', 'Degster: «BLAST оплатила всем игрокам полеты бизнес-классом на BLAST Premier. Это круто»', 'https://virtus-img.cdnvideo.ru/images/material-card/plain/cf/cf316336-5b8e-4225-b88a-38dafdb9cd7c.webp'),
(13, 1, 'Месяц с небольшим понадобился Call of Duty: Modern Warfare II, чтобы обойти по продажам в США Elden Ring, которая вышла ещё в феврале и удерживала лидерство по этому показателю почти весь год. В ноябре шутер тоже был первым по реализации, а вторую строчку заняла свежая God of War: Ragnarök.\r\n\r\nСогласно данным NPD Group, продажи консолей в ноябре выросли на 45 % по сравнению с ноябрём-2021. Лучшего всего расходилась PlayStation 5. Она сохранила за собой первое место по продажам не только за месяц, но и за год. Второй по обоим показателям осталась Switch.', 13, '2022-12-11 20:56:45', 'Modern Warfare II обошла Elden Ring и стала самой продаваемой игрой 2022 года в США', 'https://images.stopgame.ru/news/2022/12/10/c270x153/qGaN8J-50alpVYU3d3VR0w/I_m5ewX.jpg'),
(15, 1, 'Ночью прошло последнее из крупных игровых шоу года — The Game Awards. Между анонсами называли лучшие игры 2022-го.\r\nГлавное\r\nJudas — новая игра от создателя BioShock Кена Левина.\r\nАнонс Hades II про принцессу преисподней.\r\nSuicide Squad: Kill the Justice League выйдет 26 мая. Смотрите трейлер с Бэтменом.\r\nКодзима анонсировал DS 2 — с седым Ридусом и BB с тентаклями.\r\nStar Wars Jedi: Survivor выпустят 17 марта. Смотрите первый трейлер.\r\nThe Last of Us Part I появится на компьютерах 3 марта.\r\nBaldur’s Gate III покинет ранний доступ в августе 2023-го.\r\nDiablo IV выйдет 6 июня 2023 года. Смотрите новый эпичный синематик.\r\n19 апреля Элой отправится в Голливуд в DLC для Horizon Forbidden West, но только на PS5.\r\nArmored Core VI: Fires of Rubicon — экшен про огромных мехов от FromSoftware.\r\nИдрис Эльба сыграл агента ФРУ в дополнении для Cyberpunk 2077.\r\nFinal Fantasy XVI выпустят 22 июня 2023-го. Смотрите трейлер.\r\nBayonetta Origins: Cereza and the Lost Demon — красочный экшен о юной Байонетте.\r\n505 Games представила шутер Crime Boss: Rockay City — смесь Payday и GTA c Чаком Норрисом.\r\nВ 2023 году выйдет сиквел соулслайк-шутера Remnant: From the Ashes.\r\nBanishers: Ghosts of New Eden — нелинейный ролевой экшен от авторов Life is Strange и Vampyr.\r\nАнонс Transformers: Reactivate — сетевого экшена про автоботов.\r\nEarthblade — экшен-платформер от создателей Celeste.\r\nКроме того, в конце шоу случился забавный инцидент — подросток вышел на сцену TGA вместе с авторами Elden Ring и упомянул Билла Клинтона (Bill Clinton).', 13, '2022-12-12 00:55:44', 'Всё, что показали на The Game Awards 2022', 'https://images.stopgame.ru/news/2022/12/09/c270x153/xzYGMKDmRLcWkqMHJjmcQA/Tewxp8YA.jpg'),
(16, 3, 'ЧМ-2022. 1/4 финала. Франция – Англия -- 2:1\r\n\r\nГолы: Чуамени (17), Жиру (78) – Кейн (54, с пенальти)\r\n\r\nУверенность французов чувствовалась уже на дебютном отрезке. Однако англичане, поначалу согласившись на роль очень условного второго номера, были к активности оппонента готовы и нервозности не выказывали. Тот же защитник Кайл Уокер на подконтрольном ему фланге если и позволял маневрировать резвому Килиану Мбаппе, то лишь на подступах к штрафной.\r\n\r\nВпрочем, именно за ее пределами и зародились неприятности для сборной Англии: хавбек Орельен Чуамени умело выбрал момент для удара и с 25 метров поразил дальний угол ворот Джордана Пикфорда.\r\n\r\nПропустив, британцы по-настоящему завелись. Основным источником французских проблем стал Харри Кейн, который дважды реально был близок к голевому успеху.\r\n\r\nБомбардирское счастье капитан англичан нашел вскоре после перерыва — когда уверенно реализовал пенальти, к которому привело нарушение героя первого тайма Чуамени. 1:1 — и противостояние перешло в новую фазу. \r\n\r\nСудьбу матча решили звезды. На 78-й минуте второй \"ассист\" в игре заработал Антуан Гризманн, с передачи которого \"трехцветных\" вновь вывел вперед блистающий в Катаре Оливье Жиру.\r\n\r\nА на 84-й минуте надежды англичан на спасение убил все тот же Кейн. Один из лучших игроков встречи решился исполнить и второй одиннадцатиметровый. Но дрогнул и зарядил выше ворот. Финишный штурм британцев цифр на табло не изменил.\r\n\r\nТаким образом, в полуфиналах 13 и 14 декабря сойдутся соответственно Хорватия — Аргентина и Марокко — Франция.', 20, '2022-12-12 00:58:37', 'ЧМ-2022. Кейн не забил пенальти и лишил англичан надежд на полуфинал, дальше идут французы', 'https://smartpress.by/upload/slam.image/medialibrary/03a/uz1zsw1wczcgmm9wipx0x5lv9kcdptpo/1200_2000_1/mbappe-90.jpg'),
(17, 5, 'Выступление на большой сцене, демонстрация таланта и оценка компетентного жюри - отличная возможность реализации для юных пианистов.\r\n\r\nДети в возрасте от 6 до 15 лет приняли участие в открытом городском конкурсе \"Маленькие клавиши\", который прошел в столичном Дворце детей и молодежи.\r\n\r\nВ инструментальном исполнении кроме классических произведений звучала эстрадная и джазовая музыка. Определены лучшие в четырех возрастных категориях.\r\n\r\n', 20, '2022-12-12 01:05:43', '\"Маленькие клавиши\" - конкурс юных пианистов состоялся в Минске', 'https://static.tvr.by/upload/resize_cache/iblock/890/253_142_2/b4ty6p5f364y4j1fvd2j5j3i5hn4hyun.jpg'),
(18, 5, 'К новогодним праздникам в столице пройдут свыше 250 мероприятий. Продолжатся они с 25 декабря по 15 января.\r\n\r\nДля минчан и гостей города подготовлена насыщенная программа. У Дворца спорта ежедневно с 19:00 до 20:00 будет работать интерактивная площадка \"Минск древний\".\r\n\r\nС наступающими праздниками посетителей поздравят сказочные персонажи - Дед Мороз и Снегурочка.\r\n\r\nЭта же локация станет площадкой для презентации концертной программы \"Щедрый вечер\", которая пройдет 25 декабря.\r\n\r\nВ новогоднюю ночь гулянья продолжатся до 4-х утра, также будет работать и ярмарка.\r\n\r\n7 января юных гостей ждут захватывающие \"Рождественские встречи\". Масштабные празднования развернутся и в Верхнем городе.\r\n\r\nВ этом году к празднику начнет работу новая новогодняя ярмарка на улице Раковской, 25. Здесь запланированы музыкальная программа, конкурсы, игры и даже караоке. В каждом районе пройдут более двух десятков мероприятий.', 20, '2022-12-12 01:06:18', 'В Минске запланировано свыше 250 мероприятий. Чем запомнится волшебная ночь и рождественские недели?', 'https://static.tvr.by/upload/resize_cache/iblock/581/253_142_2/bcrx63zd7laujzhdjesnufvr1093a5oi.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `role_id` int UNSIGNED NOT NULL,
  `role_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Author'),
(3, 'User');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `user_id` int UNSIGNED NOT NULL,
  `login` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role_id` int UNSIGNED NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `login`, `email`, `password`, `avatar`, `role_id`) VALUES
(13, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'https://pixelbox.ru/wp-content/uploads/2021/05/ava-vk-animal-91.jpg', 1),
(20, 'author', 'author@gmail.com', '202cb962ac59075b964b07152d234b70', 'https://st2.depositphotos.com/1007566/11872/v/950/depositphotos_118724142-stock-illustration-reporter-avatar-with-laptop-isolated.jpg', 2),
(21, 'user', 'user@gmail.com', '202cb962ac59075b964b07152d234b70', 'https://e7.pngegg.com/pngimages/428/137/png-clipart-male-avatar-young-user-icon-icons-logos-emojis-users.png', 3);

--
-- Триггеры `user`
--
DELIMITER $$
CREATE TRIGGER `last_login` AFTER INSERT ON `user` FOR EACH ROW SET @login = NEW.login
$$
DELIMITER ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`) USING BTREE,
  ADD KEY `comment_author` (`comment_author`) USING BTREE;

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `category_id` (`category_id`) USING BTREE,
  ADD KEY `post_author` (`post_author`) USING BTREE;

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`comment_author`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`post_author`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
