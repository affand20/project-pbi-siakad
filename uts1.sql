/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     4/13/2017 8:01:44 PM                         */
/*==============================================================*/


drop table if exists NILAI;

drop table if exists SISWA;

drop table if exists TU;

drop table if exists WALI_KELAS;

/*==============================================================*/
/* Table: NILAI                                                 */
/*==============================================================*/
create table NILAI
(
   NIP                  char(6) not null,
   NIS                  char(6) not null,
   NILAI_UTS            int not null,
   NILAI_UAS            int not null,
   NILAI_TUGAS          int not null,
   NILAI_ULANGAN        int not null
);

/*==============================================================*/
/* Table: SISWA                                                 */
/*==============================================================*/
create table SISWA
(
   NIS                  char(6) not null,
   NIP                  char(6) not null,
   NIK                  char(6) not null,
   NAMA_SISWA           varchar(50) not null,
   JK_SISWA             bool not null,
   ALAMAT_SISWA         varchar(120) not null,
   PASSWORD_SISWA       varchar(8) not null,
   primary key (NIS)
);

/*==============================================================*/
/* Table: TU                                                    */
/*==============================================================*/
create table TU
(
   NIK                  char(6) not null,
   NAMA_TU              varchar(50) not null,
   JK_TU                bool not null,
   ALAMAT_TU            varchar(120) not null,
   PASSWORD_TU          varchar(8) not null,
   primary key (NIK)
);

/*==============================================================*/
/* Table: WALI_KELAS                                            */
/*==============================================================*/
create table WALI_KELAS
(
   NIP                  char(6) not null,
   NIK                  char(6) not null,
   NAMA_WALI            varchar(50) not null,
   JK_WALI              bool not null,
   ALAMAT_WALI          varchar(120) not null,
   PASSWORD_WALI        varchar(8) not null,
   primary key (NIP)
);

alter table NILAI add constraint FK_AKSES foreign key (NIS)
      references SISWA (NIS) on delete restrict on update restrict;

alter table NILAI add constraint FK_INPUT foreign key (NIP)
      references WALI_KELAS (NIP) on delete restrict on update restrict;

alter table SISWA add constraint FK_DIWALI foreign key (NIP)
      references WALI_KELAS (NIP) on delete restrict on update restrict;

alter table SISWA add constraint FK_MENGISI foreign key (NIK)
      references TU (NIK) on delete restrict on update restrict;

alter table WALI_KELAS add constraint FK_MENGEDIT foreign key (NIK)
      references TU (NIK) on delete restrict on update restrict;

