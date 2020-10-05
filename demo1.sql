CREATE DATABASE demo1;

---- Create User table

create table user
(
    id                   int auto_increment
        primary key,
    username             varchar(255)        not null,
    auth_key             varchar(32)         not null,
    password_hash        varchar(255)        not null,
    password_reset_token varchar(255)        null,
    email                varchar(255)        not null,
    status               smallint default 10 not null,
    created_at           int                 not null,
    updated_at           int                 not null,
    verification_token   varchar(255)        null,
    constraint email
        unique (email),
    constraint password_reset_token
        unique (password_reset_token),
    constraint username
        unique (username)
)

---- Create Department table

create table department
(
    id             int auto_increment
        primary key,
    dep_name       varchar(255)        not null,
    dep_desciption varchar(255)        not null,
    status         smallint default 10 not null,
    created_at     int                 not null,
    updated_at     int                 not null,
    constraint dep_name
        unique (dep_name)
);

---- Create Staff table

create table staff
(
    id          int auto_increment
        primary key,
    staff_name  varchar(255)        not null,
    staff_email varchar(255)        not null,
    staff_tel   varchar(255)        not null,
    dep_name    varchar(255)        not null,
    status      smallint default 10 not null,
    created_at  int                 not null,
    updated_at  int                 not null,
    constraint staff_email
        unique (staff_email),
    constraint fk_staff_department
        foreign key (dep_name) references department (dep_name)
);
    collate = utf8_unicode_ci;

INSERT INTO demo1.user (id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at, verification_token) VALUES (1, 'hoang', 's_ERWU06fugjl2HXypDOmuX4ayg6wCTc', '$2y$13$CpLEOgrC9NILW9GFGiAbHu58yIk4j1Gy.AcvXDZxjFjcKPgTOdTs2', null, 'hoangtd1706@gmail.com', 10, 1601438979, 1601438979, 'Nz_g8a08ZpueDoGUucvkUg8P9W-EDoA-_1601438979');
INSERT INTO demo1.user (id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at, verification_token) VALUES (2, 'admin', 'hd_T16Cn6yH7EnFvhV2xcgf5SO4qLGcN', '$2y$13$pB/tAw2jNYx2tBUzMWml9OPXO65v7DgXwcZ21WPVR1PbNUz7Wt78u', null, 'hoang@gmail.com', 10, 1601439123, 1601439123, 'tcDedZk3Et3aaHWLuCFYe_1KnsgpA1ex_1601439123');

-------Insert data to Department table
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (1, 'Nhân sự 0', 'Phòng nhân sự công ty', 1, 1601535364, 1601625367);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (2, 'Phòng kế toán', 'Phòng kế toán công ty', 1, 1601535399, 1601535399);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (3, 'Nhân sự 1', 'Phòng nhân sự công ty', 1, 1601536562, 1601536562);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (4, 'Nhân sự 2', 'Phòng nhân sự công ty', 1, 1601536575, 1601536575);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (5, 'Nhân sự 3', 'Phòng nhân sự công ty', 1, 1601536588, 1601536588);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (6, 'Nhân sự 4', 'Phòng nhân sự công ty', 1, 1601536598, 1601536598);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (7, 'Phòng kế toán 1', 'Phòng kế toán công ty', 1, 1601536610, 1601536610);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (8, 'Phòng kế toán 2', 'Phòng kế toán công ty', 1, 1601536623, 1601536623);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (9, 'Phòng kế toán 4', 'Phòng kế toán công ty', 1, 1601536637, 1601536637);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (10, 'Phòng kế toán 5', 'Phòng kế toán công ty', 1, 1601536652, 1601536652);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (11, 'Phòng kế toán 6', 'Phòng kế toán công ty', 1, 1601536663, 1601536663);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (12, 'Phòng kế toán 7', 'Phòng kế toán công ty', 1, 1601536682, 1601536682);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (13, 'Phòng kế toán 8', 'Phòng kế toán công ty', 1, 1601536693, 1601536693);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (14, 'Phòng kế toán 9', 'Phòng kế toán công ty', 1, 1601536703, 1601536703);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (15, 'Phòng kế toán 10', 'Phòng kế toán công ty', 0, 1601536714, 1601536714);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (16, 'Phòng kế toán 11', 'Phòng kế toán công ty', 0, 1601536752, 1601536752);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (17, 'Phòng kế toán 12', 'Phòng kế toán công ty', 0, 1601536770, 1601536770);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (18, 'Nhân sự 5', 'Phòng nhân sự công ty', 0, 1601536786, 1601536786);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (19, 'Nhân sự 6', 'Phòng nhân sự công ty', 0, 1601536798, 1601536798);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (20, 'Nhân sự 7', 'Phòng nhân sự công ty', 0, 1601536808, 1601536808);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (21, 'Nhân sự 8', 'Phòng nhân sự công ty', 0, 1601536818, 1601536818);
INSERT INTO demo1.department (id, dep_name, dep_desciption, status, created_at, updated_at) VALUES (22, 'Nhân sự 9', 'Phòng nhân sự công ty', 0, 1601536832, 1601536832);

------------Insert data to Staff table
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (1, 'Hihi', 'hihi@gmail.com', '0987654321', 'Phòng kế toán', 1, 1601543311, 1601689407);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (2, 'hoangoihoang', 'hihi1@gmail.com', '0987612345', 'Nhân sự 1', 1, 1601601626, 1601601626);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (3, 'Hihi1', 'hoangtd1706@gmail.com', '0987654321', 'Nhân sự 1', 1, 1601621002, 1601621002);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (4, 'sdf', 'hoangtd17061@gmail.com', '0987654321', 'Nhân sự 1', 1, 1601621073, 1601621073);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (5, 'Hihi2', 'hoangtd17062@gmail.com', '0987654321', 'Nhân sự 1', 1, 1601621092, 1601621092);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (6, 'dfhgh', 'hoangtd17063@gmail.com', '0987654321', 'Nhân sự 1', 0, 1601621106, 1601621106);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (7, 'ewte', 'hoangtd17064@gmail.com', '0987654321', 'Nhân sự 1', 0, 1601621119, 1601621119);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (8, 'ewtr', 'hoangtd17065@gmail.com', '0987654321', 'Nhân sự 1', 0, 1601621132, 1601621132);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (20, 'hdfh', 'hoangtd17067@gmail.com', '0987654321', 'Nhân sự 1', 0, 1601621163, 1601621163);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (21, 'OiHoangOi', 'hoangtd17068@gmail.com', '0987654321', 'Nhân sự 1', 0, 1601621178, 1601687477);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (22, 'rtyu', 'hoangtd17069@gmail.com', '0987654321', 'Nhân sự 1', 0, 1601621231, 1601621231);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (23, 'fgfhj', 'hoangtd17060@gmail.com', '0987654321', 'Nhân sự 1', 0, 1601621248, 1601621248);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (24, 'kkhgjk', 'hoang1@exam.com', 'aksjdfkj', 'Nhân sự 1', 0, 1601621292, 1601621292);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (25, 'hoangoihoang', 'hoang2@exam.com', '0987654321', 'Nhân sự 0', 0, 1601621309, 1601621309);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (26, 'Hihi1', 'hoang3@exam.com', '0987654321', 'Nhân sự 0', 0, 1601621328, 1601621328);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (27, 'Hihi1', 'hoang4@exam.com', '0987612345', 'Nhân sự 0', 0, 1601621351, 1601621351);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (28, 'hoangoihoang', 'hoang5@exam.com', '0987654321', 'Nhân sự 0', 0, 1601621365, 1601621365);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (29, 'Hihi2', 'hoang6@exam.com', '0987612345', 'Nhân sự 0', 0, 1601621381, 1601621381);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (30, 'sdf', 'hoang7@exam.com', '0987654321', 'Nhân sự 0', 0, 1601621407, 1601621407);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (31, 'dfhgh', 'hoang8@exam.com', '0987612345', 'Nhân sự 0', 0, 1601621422, 1601621422);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (32, 'ry', 'hoang9@exam.com', '0987612345', 'Nhân sự 0', 0, 1601621445, 1601621445);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (33, 'Hihi', 'hi1@exam.com', '0987654321', 'Nhân sự 0', 0, 1601621528, 1601621528);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (34, 'dfhgh', 'hi2@exam.com', '0987612345', 'Nhân sự 0', 0, 1601621550, 1601621550);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (35, 'hihi', 'hihi1@exam.com', '0987654321', 'Nhân sự 0', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (36, 'hihi', 'hihi2@exam.com', '0987654321', 'Nhân sự 0', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (37, 'hihi', 'hihi3@exam.com', '0987654321', 'Nhân sự 0', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (38, 'hihi', 'hihi4@exam.com', '0987654321', 'Nhân sự 0', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (39, 'hihi', 'hihi5@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (40, 'hihi', 'hihi6@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (41, 'hihi', 'hihi7@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (42, 'hihi', 'hihi8@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (43, 'hihi', 'hihi9@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (44, 'hihi', 'hihi10@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (45, 'hihi', 'hihi11exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (46, 'hihi', 'hihi12@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (47, 'hihi', 'hihi13@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (48, 'hihi', 'hihi14@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (49, 'hihi', 'hihi15@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (50, 'hihi', 'hihi16@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (51, 'hihi', 'hihi17@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (52, 'hihi', 'hihi18@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (53, 'hihi', 'hihi19@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (54, 'hihi', 'hihi20@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (55, 'hihi', 'hihi21@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (56, 'hihi', 'hihi22@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (57, 'hihi', 'hihi23@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (58, 'hihi', 'hihi24@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (59, 'hihi', 'hihi25@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (60, 'hihi', 'hihi26@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (61, 'hihi', 'hihi27@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (62, 'hihi', 'hihi28@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (63, 'hihi', 'hihi29@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (64, 'hihi', 'hihi30@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (65, 'hihi', 'hihi31@exam.com', '0987654321', 'Nhân sự 2', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (66, 'hihi', 'hihi32@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (67, 'hihi', 'hihi33@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (68, 'hihi', 'hihi34@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (69, 'hihi', 'hihi35@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (70, 'hihi', 'hihi36@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (71, 'hihi', 'hihi37@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (72, 'hihi', 'hihi38@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (73, 'hihi', 'hihi39@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (74, 'hihi', 'hihi40@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (75, 'hihi', 'hihi41@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (76, 'hihi', 'hihi42@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (77, 'hihi', 'hihi43@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (78, 'hihi', 'hihi44@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (79, 'hihi', 'hihi45@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (80, 'hihi', 'hihi46@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (81, 'hihi', 'hihi47@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (82, 'hihi', 'hihi48@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (83, 'hihi', 'hihi49@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (84, 'hihi', 'hihi50@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (85, 'hihi', 'hoho1@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (86, 'hihi', 'hoho2@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (87, 'hihi', 'hoho3@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (88, 'hihi', 'hoho4@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (89, 'hihi', 'hoho5@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (90, 'hihi', 'hoho6@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (91, 'hihi', 'hoho7@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (92, 'hihi', 'hoho8@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (93, 'hihi', 'hoho9@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (94, 'hihi', 'hoho10@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (95, 'hihi', 'hoho11exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (96, 'hihi', 'hoho12@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (97, 'hihi', 'hoho13@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (98, 'hihi', 'hoho14@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (99, 'hihi', 'hoho15@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (100, 'hihi', 'hoho16@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (101, 'hihi', 'hoho17@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (102, 'hihi', 'hoho18@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (103, 'hihi', 'hoho19@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (104, 'hihi', 'hoho20@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (105, 'hihi', 'hoho21@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (106, 'hihi', 'hoho22@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (107, 'hihi', 'hoho23@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (108, 'hihi', 'hoho24@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (109, 'hihi', 'hoho25@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (110, 'hihi', 'hoho26@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (111, 'hihi', 'hoho27@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (112, 'hihi', 'hoho28@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (113, 'hihi', 'hoho29@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (114, 'hihi', 'hoho30@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (115, 'hihi', 'hoho31@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (116, 'hihi', 'hoho32@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (117, 'hihi', 'hoho33@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (118, 'hihi', 'hoho34@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (119, 'hihi', 'hoho35@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (120, 'hihi', 'hoho36@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (121, 'hihi', 'hoho37@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (122, 'hihi', 'hoho38@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (123, 'hihi', 'hoho39@exam.com', '0987654321', 'Nhân sự 4', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (124, 'hihi', 'hoho40@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (125, 'hihi', 'hoho41@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (126, 'hihi', 'hoho42@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (127, 'hihi', 'hoho43@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (128, 'hihi', 'hoho44@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (129, 'hihi', 'hoho45@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (130, 'hihi', 'hoho46@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (131, 'hihi', 'hoho47@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (132, 'hihi', 'hoho48@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (133, 'hihi', 'hoho49@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (134, 'hihi', 'hoho50@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (135, 'hihi', 'hehe1@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (136, 'hihi', 'hehe2@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (137, 'hihi', 'hehe3@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (138, 'hihi', 'hehe4@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (139, 'hihi', 'hehe5@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (140, 'hihi', 'hehe6@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (141, 'hihi', 'hehe7@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (142, 'hihi', 'hehe8@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (143, 'hihi', 'hehe9@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (144, 'hihi', 'hehe10@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (145, 'hihi', 'hehe11exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (146, 'hihi', 'hehe12@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (147, 'hihi', 'hehe13@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (148, 'hihi', 'hehe14@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (149, 'hihi', 'hehe15@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (150, 'hihi', 'hehe16@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (151, 'hihi', 'hehe17@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (152, 'hihi', 'hehe18@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (153, 'hihi', 'hehe19@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (154, 'hihi', 'hehe20@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (155, 'hihi', 'hehe21@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (156, 'hihi', 'hehe22@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (157, 'hihi', 'hehe23@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (158, 'hihi', 'hehe24@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (159, 'hihi', 'hehe25@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (160, 'hihi', 'hehe26@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (161, 'hihi', 'hehe27@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (162, 'hihi', 'hehe28@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (163, 'hihi', 'hehe29@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (164, 'hihi', 'hehe30@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (165, 'hihi', 'hehe31@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (166, 'hihi', 'hehe32@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (167, 'hihi', 'hehe33@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (168, 'hihi', 'hehe34@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (169, 'hihi', 'hehe35@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (170, 'hihi', 'hehe36@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (171, 'hihi', 'hehe37@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (172, 'hihi', 'hehe38@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (173, 'hihi', 'hehe39@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (174, 'hihi', 'hehe40@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (175, 'hihi', 'hehe41@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (176, 'hihi', 'hehe42@exam.com', '0987654321', 'Nhân sự 5', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (177, 'hihi', 'hehe43@exam.com', '0987654321', 'Nhân sự 3', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (178, 'hihi', 'hehe44@exam.com', '0987654321', 'Nhân sự 3', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (179, 'hihi', 'hehe45@exam.com', '0987654321', 'Nhân sự 3', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (180, 'hihi', 'hehe46@exam.com', '0987654321', 'Nhân sự 3', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (181, 'hihi', 'hehe47@exam.com', '0987654321', 'Nhân sự 3', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (182, 'hihi', 'hehe48@exam.com', '0987654321', 'Nhân sự 3', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (183, 'hihi', 'hehe49@exam.com', '0987654321', 'Nhân sự 3', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (184, 'hihi', 'hehe50@exam.com', '0987654321', 'Nhân sự 3', 1, 1601543311, 1601543311);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (185, 'Hihi1', 'h06@gmail.com', '0987654321', 'Nhân sự 3', 0, 1601624361, 1601624361);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (186, 'afasf', 'hoangtd1706465@gmail.com', '0987654321', 'Nhân sự 3', 1, 1601624932, 1601688359);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (189, 'hoangoihoang', 'hoangtd666@gmail.com', '0987654321', 'Nhân sự 0', 0, 1601689712, 1601689712);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (190, 'hoang', 'hoangt45546@gmail.com', '0987654321', 'Nhân sự 0', 0, 1601690500, 1601690500);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (191, 'hoang', 'hoangt456@gmail.com', '0987654321', 'Nhân sự 0', 0, 1601690550, 1601690550);
INSERT INTO demo1.staff (id, staff_name, staff_email, staff_tel, dep_name, status, created_at, updated_at) VALUES (196, 'Hihi1', 'trananhhoang6688@gmail.com', '0987612345', 'Phòng kế toán', 0, 1601862532, 1601862532);
