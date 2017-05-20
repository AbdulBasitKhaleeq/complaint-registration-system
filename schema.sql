
CREATE TABLE `author` (
  `author_id` int(5) NOT NULL,
  `author_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(6) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `category_id` int(6) NOT NULL,
  `author_id` int(5) NOT NULL,
  `publisher_id` int(3) NOT NULL,
  `edition` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `copyright` int(4) NOT NULL,
  `pages` int(4) NOT NULL,
  `ISBN` text NOT NULL,
  `no_of_books` int(3) NOT NULL,
  `no_of_avlbl_books` int(3) NOT NULL,
  `no_of_borrowed_books` int(3) NOT NULL,
  `shelf_no` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(6) NOT NULL,
  `cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` varchar(12) NOT NULL,
  `f_name` text NOT NULL,
  `f_dept` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


CREATE TABLE `librarian` (
  `librarian_id` varchar(12) NOT NULL,
  `librarian_name` text not null,
  `user_name` text NOT NULL,
  `password` text not null

  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `pub_id` int(3) NOT NULL,
  `pub_name` text NOT NULL,
  `pub_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


create table department(
dept_id int(3) not null auto_increment,
dept_name text not null,
primary key(dept_id)
);




--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` varchar(12) NOT NULL,
  `std_name` text NOT NULL,
  `std_dept` int(3) NOT NULL,
  `std_degree` text NOT NULL,
  `std_semester` text NOT NULL,
  `expiry date` date not Null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_book_relation`
--

CREATE TABLE `student_book_relation` (
  `librarian_id` varchar(12) NOT NULL,
  `std_id` varchar(12) NOT NULL,
  `book_id` int(6) NOT NULL,
  `isue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `fine` int(4)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `faculty_book_relation` (
  `librarian_id` varchar(12) NOT NULL,
  `f_id` varchar(12) NOT NULL,
  `book_id` int(6) NOT NULL,
  `isue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `fine` int(4)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`librarian_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`pub_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `student_book_relation`
--
ALTER TABLE `student_book_relation`
  ADD PRIMARY KEY (`std_id`,`librarian_id`,`book_id`);


alter table books add constraint foreign key (author_id) references author(author_id);
alter table books add constraint foreign key (category_id) references category(cat_id);
alter table books add constraint foreign key (publisher_id) references publisher(pub_id);

alter table student add constraint foreign key (std_dept) references department(dept_id);
alter table faculty add constraint foreign key (f_dept) references department(dept_id);

alter table faculty_book_relation add constraint foreign key(librarian_id) references librarian(librarian_id);
alter table faculty_book_relation add constraint foreign key(book_id) references books(book_id);
alter table faculty_book_relation add constraint foreign key(f_id) references faculty(f_id);


alter table student_book_relation add constraint foreign key(librarian_id) references librarian(librarian_id);
alter table student_book_relation add constraint foreign key(book_id) references books(book_id);
alter table student_book_relation add constraint foreign key(std_id) references student(std_id);

INSERT INTO `lms_db`.`author` (`author_id`, `author_name`) VALUES ('1', 'pak');
INSERT INTO `lms_db`.`author` (`author_id`, `author_name`) VALUES ('2', 'abc');
INSERT INTO `lms_db`.`author` (`author_id`, `author_name`) VALUES ('3', 'xyz');



INSERT INTO `lms_db`.`category` (`cat_id`, `cat_name`) VALUES ('1', 'math');
INSERT INTO `lms_db`.`category` (`cat_id`, `cat_name`) VALUES ('2', 'computer science');
INSERT INTO `lms_db`.`category` (`cat_id`, `cat_name`) VALUES ('3', 'physics');

INSERT INTO `lms_db`.`publisher` (`pub_id`, `pub_name`, `pub_address`) VALUES ('1', 'sufi', 'lahore');
INSERT INTO `lms_db`.`publisher` (`pub_id`, `pub_name`, `pub_address`) VALUES ('2', 'ab', 'isb');
INSERT INTO `lms_db`.`publisher` (`pub_id`, `pub_name`, `pub_address`) VALUES ('3', 'zahid', 'fsd');


INSERT INTO `lms_db`.`department` (`dept_id`, `dept_name`) VALUES ('1', 'math');
INSERT INTO `lms_db`.`department` (`dept_id`, `dept_name`) VALUES ('2', 'physics');
INSERT INTO `lms_db`.`department` (`dept_id`, `dept_name`) VALUES ('3', 'computer science');


INSERT INTO `lms_db`.`books` (`book_id`, `book_title`, `category_id`, `author_id`, `publisher_id`, `edition`, `available`, `copyright`, `pages`, `ISBN`, `no_of_books`, `no_of_avlbl_books`, `no_of_borrowed_books`, `shelf_no`) VALUES ('1', 'maths book', '1', '1', '1', '1', '1', '1999', '450', '1478545', '7', '7', '0', '15');
INSERT INTO `lms_db`.`books` (`book_id`, `book_title`, `category_id`, `author_id`, `publisher_id`, `edition`, `available`, `copyright`, `pages`, `ISBN`, `no_of_books`, `no_of_avlbl_books`, `no_of_borrowed_books`, `shelf_no`) VALUES ('2', 'physics book', '2', '1', '1', '1', '1', '2015', '440', '2558844', '5', '5', '0', '11');


INSERT INTO `lms_db`.`librarian` (`librarian_id`, `librarian_name`, `user_name`, `password`) VALUES ('1', 'bilal', 'bilal_khleeq', '123445');
