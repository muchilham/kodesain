/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.27 : Database - kodesain_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kodesain_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kodesain_db`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`username`,`password`,`nama_lengkap`,`foto`) values ('ilham','malam','Muchammad Ilham','2.jpg');
insert  into `admin`(`username`,`password`,`nama_lengkap`,`foto`) values ('yadi','yadi','Muhammad Nuryadi','6.jpg');

/*Table structure for table `combojabatan` */

DROP TABLE IF EXISTS `combojabatan`;

CREATE TABLE `combojabatan` (
  `jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `combojabatan` */

insert  into `combojabatan`(`jabatan`) values ('admin');
insert  into `combojabatan`(`jabatan`) values ('pekerja');

/*Table structure for table `keahlian` */

DROP TABLE IF EXISTS `keahlian`;

CREATE TABLE `keahlian` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `keahlian` */

insert  into `keahlian`(`id`,`kategori`) values (6,'Desain Logo');
insert  into `keahlian`(`id`,`kategori`) values (9,'Desain Flat');
insert  into `keahlian`(`id`,`kategori`) values (11,'Desain Web');
insert  into `keahlian`(`id`,`kategori`) values (12,'Typography');

/*Table structure for table `keranjang` */

DROP TABLE IF EXISTS `keranjang`;

CREATE TABLE `keranjang` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kode_produk` (`kode_produk`),
  KEY `keranjang_ibfk_1` (`username`),
  CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE,
  CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

/*Data for the table `keranjang` */

insert  into `keranjang`(`id`,`username`,`kode_produk`) values (49,'ilham.much','FAQ5');
insert  into `keranjang`(`id`,`username`,`kode_produk`) values (53,'ilham.much','FAQ2');

/*Table structure for table `pekerja` */

DROP TABLE IF EXISTS `pekerja`;

CREATE TABLE `pekerja` (
  `username_pekerja` varchar(20) NOT NULL,
  `password_pekerja` varchar(100) NOT NULL,
  `nama_pekerja` varchar(100) NOT NULL,
  `email_pekerja` varchar(100) NOT NULL,
  `foto_pekerja` varchar(100) DEFAULT NULL,
  `status_pekerja` varchar(100) NOT NULL,
  PRIMARY KEY (`email_pekerja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pekerja` */

insert  into `pekerja`(`username_pekerja`,`password_pekerja`,`nama_pekerja`,`email_pekerja`,`foto_pekerja`,`status_pekerja`) values ('egy','egy','Egy kurniawan','egykurniawanZ@gmail.com','4.jpg','aktif');
insert  into `pekerja`(`username_pekerja`,`password_pekerja`,`nama_pekerja`,`email_pekerja`,`foto_pekerja`,`status_pekerja`) values ('faqih','faqih','Faqih Hadya Gustin','takatomath@outlook.com','1.jpg','aktif');
insert  into `pekerja`(`username_pekerja`,`password_pekerja`,`nama_pekerja`,`email_pekerja`,`foto_pekerja`,`status_pekerja`) values ('irham','irham','Irham Mustofa','tidakasli@gmail.com','3.jpg','aktif');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `bayar` decimal(10,0) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `foto_bukti` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id`,`username`,`waktu`,`total_harga`,`bayar`,`atas_nama`,`foto_bukti`) values (1,'muchilham','02 June 2015 - 03:31 pm',370000,380000,'kk','9.jpg');
insert  into `pembayaran`(`id`,`username`,`waktu`,`total_harga`,`bayar`,`atas_nama`,`foto_bukti`) values (2,'muchilham','02 June 2015 - 03:35 pm',35000,35000,'ok','9.jpg');

/*Table structure for table `pembelian` */

DROP TABLE IF EXISTS `pembelian`;

CREATE TABLE `pembelian` (
  `kode_pembelian` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_pembelian`),
  KEY `pembelian_ibfk_1` (`username`),
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pembelian` */

insert  into `pembelian`(`kode_pembelian`,`username`) values ('6ef80bb237adf4b6f77d0700e1255907','muchilham');
insert  into `pembelian`(`kode_pembelian`,`username`) values ('8','muchilham');

/*Table structure for table `pembelian_detil` */

DROP TABLE IF EXISTS `pembelian_detil`;

CREATE TABLE `pembelian_detil` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode_pembelian` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `tanggal_pembelian` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kode_produk` (`kode_produk`),
  KEY `kode_pembelian` (`kode_pembelian`),
  CONSTRAINT `pembelian_detil_ibfk_1` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembelian_detil_ibfk_2` FOREIGN KEY (`kode_pembelian`) REFERENCES `pembelian` (`kode_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pembelian_detil` */

insert  into `pembelian_detil`(`id`,`kode_pembelian`,`kode_produk`,`nama_produk`,`harga`,`foto_produk`,`tanggal_pembelian`) values (1,'8','FAQ5','Desain Mobile',100000,'faqih-9-1101249810557811577714981271067980176187365n.jpg','02 June 2015 - 03:31 pm');
insert  into `pembelian_detil`(`id`,`kode_pembelian`,`kode_produk`,`nama_produk`,`harga`,`foto_produk`,`tanggal_pembelian`) values (2,'8','IRH1','Logo',100000,'irham-6-24Volleyteam.png','02 June 2015 - 03:31 pm');
insert  into `pembelian_detil`(`id`,`kode_pembelian`,`kode_produk`,`nama_produk`,`harga`,`foto_produk`,`tanggal_pembelian`) values (3,'8','FAQ2','Isra Miraj 1436H',50000,'faqih-9-145483510814689552027185435449445479896079n.jpg','02 June 2015 - 03:31 pm');

/*Table structure for table `pesan` */

DROP TABLE IF EXISTS `pesan`;

CREATE TABLE `pesan` (
  `nama` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telepon` varchar(200) DEFAULT NULL,
  `pesan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pesan` */

insert  into `pesan`(`nama`,`email`,`telepon`,`pesan`) values ('Muchammad Ilham','muh.ilham0606@gmail.com','089630100214','test');
insert  into `pesan`(`nama`,`email`,`telepon`,`pesan`) values ('Muchammad Ilham','muh.ilham0606@gmail.com','089630100214','Hello');

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `email_pekerja` varchar(100) NOT NULL,
  `idkeahlian` int(10) NOT NULL,
  PRIMARY KEY (`kode_produk`),
  KEY `email_pekerja` (`email_pekerja`),
  KEY `idkeahlian` (`idkeahlian`),
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`idkeahlian`) REFERENCES `keahlian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `produk` */

insert  into `produk`(`kode_produk`,`nama_produk`,`email_pekerja`,`idkeahlian`) values ('FAQ1','Desain Game','takatomath@outlook.com',9);
insert  into `produk`(`kode_produk`,`nama_produk`,`email_pekerja`,`idkeahlian`) values ('FAQ2','Isra Miraj 1436H','takatomath@outlook.com',9);
insert  into `produk`(`kode_produk`,`nama_produk`,`email_pekerja`,`idkeahlian`) values ('FAQ3','Pendidikan Nasional','takatomath@outlook.com',9);
insert  into `produk`(`kode_produk`,`nama_produk`,`email_pekerja`,`idkeahlian`) values ('FAQ4','Bakground Laptop','takatomath@outlook.com',9);
insert  into `produk`(`kode_produk`,`nama_produk`,`email_pekerja`,`idkeahlian`) values ('FAQ5','Desain Mobile','takatomath@outlook.com',9);
insert  into `produk`(`kode_produk`,`nama_produk`,`email_pekerja`,`idkeahlian`) values ('IRH1','Logo','tidakasli@gmail.com',6);
insert  into `produk`(`kode_produk`,`nama_produk`,`email_pekerja`,`idkeahlian`) values ('IRH2','Wallpaper Desktop','tidakasli@gmail.com',9);
insert  into `produk`(`kode_produk`,`nama_produk`,`email_pekerja`,`idkeahlian`) values ('IRH3','Tampilan untuk Aplikasi Game','tidakasli@gmail.com',9);
insert  into `produk`(`kode_produk`,`nama_produk`,`email_pekerja`,`idkeahlian`) values ('IRH4','Logo ErpeelDev.','tidakasli@gmail.com',6);
insert  into `produk`(`kode_produk`,`nama_produk`,`email_pekerja`,`idkeahlian`) values ('IRH5','Typography Sederhana','tidakasli@gmail.com',12);

/*Table structure for table `produk_detil` */

DROP TABLE IF EXISTS `produk_detil`;

CREATE TABLE `produk_detil` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(100) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `foto_produk` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi_produk` text,
  PRIMARY KEY (`id`),
  KEY `produk_detil_ibfk_1` (`kode_produk`),
  CONSTRAINT `produk_detil_ibfk_1` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `produk_detil` */

insert  into `produk_detil`(`id`,`kode_produk`,`harga`,`foto_produk`,`tanggal`,`deskripsi_produk`) values (1,'FAQ1',80000,'faqih-9-1708610557487711080706083275007813077361n.png','2015-05-18','Untuk tampilan game');
insert  into `produk_detil`(`id`,`kode_produk`,`harga`,`foto_produk`,`tanggal`,`deskripsi_produk`) values (2,'FAQ2',50000,'faqih-9-145483510814689552027185435449445479896079n.jpg','2015-05-18','Memperingati Isra Miraj 1436H');
insert  into `produk_detil`(`id`,`kode_produk`,`harga`,`foto_produk`,`tanggal`,`deskripsi_produk`) values (3,'FAQ3',50000,'faqih-9-1038437910745175358978606350461491409483210n.png','2015-05-18','Memperingati Hari Pendidikan Nasional');
insert  into `produk_detil`(`id`,`kode_produk`,`harga`,`foto_produk`,`tanggal`,`deskripsi_produk`) values (4,'FAQ4',40000,'faqih-9-1092329810578545375641602772980548315555785n.png','2015-05-18','Untuk Tampilan dekstop');
insert  into `produk_detil`(`id`,`kode_produk`,`harga`,`foto_produk`,`tanggal`,`deskripsi_produk`) values (7,'IRH1',100000,'irham-6-24Volleyteam.png','2015-05-20','Ini desain logo');
insert  into `produk_detil`(`id`,`kode_produk`,`harga`,`foto_produk`,`tanggal`,`deskripsi_produk`) values (11,'FAQ5',100000,'faqih-9-1101249810557811577714981271067980176187365n.jpg','2015-06-02','Desain untuk Aplikasi Mobile');
insert  into `produk_detil`(`id`,`kode_produk`,`harga`,`foto_produk`,`tanggal`,`deskripsi_produk`) values (12,'IRH2',30000,'irham-9-153031110577558575740283556114675112947443n.png','2015-06-02','Wallpaper Desktop yang bergaya Flat.');
insert  into `produk_detil`(`id`,`kode_produk`,`harga`,`foto_produk`,`tanggal`,`deskripsi_produk`) values (13,'IRH3',100000,'irham-9-AhhHappyDay.jpg','2015-06-02','keterangan lengkap tidakasli@gmail.com');
insert  into `produk_detil`(`id`,`kode_produk`,`harga`,`foto_produk`,`tanggal`,`deskripsi_produk`) values (14,'IRH4',20000,'irham-6-Erpeeldev.png','2015-06-02','Terima Pembuatan Desain Logo');
insert  into `produk_detil`(`id`,`kode_produk`,`harga`,`foto_produk`,`tanggal`,`deskripsi_produk`) values (15,'IRH5',20000,'irham-12-ijustloveart.png','2015-06-02','Terima pembuatan Desain untuk sticker');

/*Table structure for table `project` */

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `email_pekerja` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi_foto` text NOT NULL,
  `waktu` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `id` (`id`),
  KEY `kategori` (`kategori`),
  KEY `email_pekerja` (`email_pekerja`),
  CONSTRAINT `project_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  CONSTRAINT `project_ibfk_2` FOREIGN KEY (`email_pekerja`) REFERENCES `pekerja` (`email_pekerja`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `project` */

insert  into `project`(`id`,`username`,`fullname`,`email`,`alamat`,`telepon`,`photo`,`email_pekerja`,`kategori`,`deskripsi_foto`,`waktu`,`status`) values (1,'ilham.much','Muchammad Ilham','muh.ilham2506@gmail.com','Jalan Dukuh V','089630100214','ilham.much-02-19-51, 2-06-15-erpeeldev 16.9.jpg','takatomath@outlook.com','Typography','Buat menjadi seperti gambar tetapi dengan kata-kata yang berbeda dan kata-katanya berkaitan dengan kesehatan','2015-06-02 19:19:51','Sudah dikirim');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `photos` varchar(100) NOT NULL,
  `aktivasi` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`username`,`email`,`password`,`nama_lengkap`,`alamat`,`telepon`,`photos`,`aktivasi`,`status`) values ('ilham.much','muh.ilham2506@gmail.com','57cf5ad49695e3adc1a29cf47a43bc06','Muchammad Ilham','Jalan Dukuh V','089630100214','ilham.much-22282_1055770911105856_4958073822994973299_n.jpg','97181f6cd597d0400f09c3f1ca9b8c15','nonaktif');
insert  into `user`(`username`,`email`,`password`,`nama_lengkap`,`alamat`,`telepon`,`photos`,`aktivasi`,`status`) values ('kodesain','kodesain@gmail.com','be3e3f866e9d1b01cb27c60b9a2426cf','kodesain','Jalan Bambu Apus','089630100214','kodesain-landscape-men-alone-sea-evening-beauty-nature-photography-hd-wallpaper.jpg','6303e0249a1feb4d98b0767decf9fbed','nonaktif');
insert  into `user`(`username`,`email`,`password`,`nama_lengkap`,`alamat`,`telepon`,`photos`,`aktivasi`,`status`) values ('muchilham','muh.ilham0606@gmail.com','027f210a8fe7b893ff4d95660896be0f','Muchammad Ilham','Jakarta','089630100214','muchilham-ilham.png','7fbcb036626cd67c84f48119da87ca98','nonaktif');
insert  into `user`(`username`,`email`,`password`,`nama_lengkap`,`alamat`,`telepon`,`photos`,`aktivasi`,`status`) values ('tidakasli','tidakasli@gmail.com','653e4a43d0e96c0870907deeddfab42a','','','','1412876682_user.png','7d0f3a3c6199a3b752af31a2bb694480','nonaktif');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
