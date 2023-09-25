-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Lip 2023, 23:44
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `authors`
--

INSERT INTO `authors` (`id`, `author_name`) VALUES
(1, 'Andrzej Sapkowski'),
(2, 'Remigiusz Mróz'),
(3, 'Radek Kotarski'),
(4, 'Dmitry Glukhovsky'),
(5, 'J.R.R. Tolkien');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_description` text NOT NULL,
  `publication_year` date NOT NULL,
  `book_picture` varchar(255) NOT NULL,
  `book_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`id`, `author_id`, `publisher_id`, `book_name`, `book_description`, `publication_year`, `book_picture`, `book_quantity`) VALUES
(1, 1, 1, 'Wiedźmin - Krew Elfów', '\"Krew elfów\" to pierwsza z pięciu części sagi o Wiedźminie Geralcie. Król polskiej fantastyki, Andrzej Sapkowski, raczy czytelników wspaniałą i wciągającą literaturą na najwyższym poziomie.', '2014-01-01', 'upload/pictures/wiedzmin.jpg', 25),
(2, 2, 5, 'Behawiorysta', 'Zamachowiec zajmuje przedszkole, grożąc że zabije wychowawców i dzieci. Policja jest bezsilna, a mężczyzna nie przedstawia żadnych żądań. Nikt nie wie, dlaczego wziął zakładników, ani co zamierza osiągnąć. Sytuację komplikuje fakt, że transmisja na żywo z przedszkola pojawia się w internecie.\nSłużby w akcie desperacji proszą o pomoc Gerarda Edlinga, byłego prokuratora, który został dyscyplinarnie wydalony ze służby. Edling jest specjalistą od kinezyki, działu nauki zajmującego się badaniem komunikacji niewerbalnej. Znany jest nie tylko z ekscentryzmu, ale także z tego, że potrafi rozwiązać każdą sprawę. A przynajmniej dotychczas tak było…\nRozpoczyna się gra między ścigającym a ściganym, w której tak naprawdę nie wiadomo, kto jest kim.', '2022-01-01', 'upload/pictures/behawiorysta.jpg', 0),
(3, 4, 2, 'Metro 2033', 'Rok 2033. W wyniku konfliktu atomowego świat uległ zagładzie. Ocaleli tylko nieliczni, chroniący się w moskiewskim metrze, które dzięki unikalnej konstrukcji stało się najprawdopodobniej ostatnim przyczółkiem ludzkości. Na mrocznych stacjach, rozświetlanych światłami awaryjnymi i blaskiem ognisk, ludzie ci próbują wieść życie zbliżone do tego sprzed katastrofy. Tworzą mikropaństwa spajane ideologią, religią czy po prostu ochroną filtrów wodnych... Zawierają sojusze, toczą wojny.\nWOGN to wysunięta najbardziej na północ zamieszkała stacja metra. Kiedyś była jedną z najpiękniejszych, a po zagładzie przez długi czas pozostawała bezpieczna. Teraz pojawiło się na niej śmiertelne niebezpieczeństwo.\nArtem, młody mężczyzna z WOGN-u, otrzymuje zadanie: musi przedostać się do legendarnej stacji Polis, serca moskiewskiego metra, aby przekazać ostrzeżenie o nowym niebezpieczeństwie. Od powodzenia jego misji zależy przyszłość nie tylko peryferyjnej stacji, ale być może całej ocalałej w metrze ludzkości.', '2015-01-01', 'upload/pictures/metro_2033.jpg', 13),
(4, 3, 4, 'Włam się do mózgu', 'Co jeśli większość metod, których w młodości i dorosłym życiu używamy do uczenia się wiedzy i umiejętności jest kompletnie bezużyteczna? Dlaczego pamiętamy tak mało informacji ze szkoły? Czas to zmienić!\nRadek Kotarski wziął pod lupę setki naukowych artykułów i książek, a następnie przeprowadził na sobie serię eksperymentów, aby sprawdzić przeróżne metody uczenia się. Wszystko po to, aby wytypować skuteczne techniki, za pomocą których można w nowoczesny i przyjemny sposób zdobywać wiedzę. To one będą prawdziwymi wytrychami, którymi włamiemy się do naszych mózgów! W końcu przez całe życie mieliśmy i mamy jeszcze sporo do zapamiętania.', '2017-01-01', 'upload/pictures/wlam_sie_do_mozgu.jpg', 7),
(5, 5, 3, 'Władca Pierścieni. Drużyna Pierścienia', '\"Drużyna Pierścienia\" to pierwsza część trylogii J.R.R. Tolkiena, w której poznajemy naszych bohaterów i dowiadujemy się, co sprawia, że opuszczają swoje domy i wyruszają w niebezpieczną misję zniszczenia Jedynego Pierścienia, poszukiwanego przez jego prawowitego właściciela, władcę Mordoru - Saurona. Akcja powieści toczy się w Śródziemiu, krainie stworzonej, narysowanej i opisanej przez autora w najmniejszych detalach. Poznajemy tę krainę i kibicujemy bohaterom, którzy zrobią wszystko, żeby uratować ją i jej mieszkańców.\n\nFrodo, Sam, Merry, Pippin (hobbici), Gandalf (czarodziej), Gimli (krasnolud), Legolas (elf), Aragorn i Boromir (ludzie) to nasza tytułowa \"Drużyna Pierścienia\", która w trakcie wyprawy przeżyje wiele przygód i zmierzy się z wieloma problemami, spotka sprzymierzeńców i stanie do walki z wrogami. Ostatecznie każdy z członków drużyny stanie się silniejszy i przezwycięży własne słabości. Nasi bohaterowie lepiej się poznają, a nawet zaprzyjaźniają, i to mimo różnic, które pierwotnie wydają się bardzo duże. Połączy ich silna więź, która pozostanie z nimi już na zawsze.', '2017-01-01', 'upload/pictures/druzyna_pierscienia.jpg', 25);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `publisher_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `publishers`
--

INSERT INTO `publishers` (`id`, `publisher_name`) VALUES
(1, 'Super Nowa'),
(2, 'Insignis'),
(3, 'Muza'),
(4, 'Altenberg'),
(5, 'Wydawnictwo filia');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- Indeksy dla tabeli `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
