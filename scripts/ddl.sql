/* Drop Database and Create Database */
drop database if exists async;
create database if not exists async COLLATE utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 0;
drop table if exists accounts;
SET FOREIGN_KEY_CHECKS = 1;

create table accounts(
`id` varchar(36) NOT NULL,
primary key (`id`),
`username` varchar (48) COLLATE utf8mb4_unicode_ci NOT NULL,
`forename` varchar (48) COLLATE utf8mb4_unicode_ci NOT NULL,
`surname` varchar (48) COLLATE utf8mb4_unicode_ci NOT NULL,
`email` varchar (128) COLLATE utf8mb4_unicode_ci NOT NULL,
unique (`id`, `username`, `email`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 

# Auto UUID new user records
# https://dba.stackexchange.com/questions/57293/mysql-alter-table-to-automatically-put-in-a-uuid
CREATE TRIGGER before_insert_mytable
  BEFORE INSERT ON accounts
  FOR EACH ROW
  SET new.id = uuid();

INSERT INTO accounts (`id`, `username`, `forename`, `surname`, `email`)
	VALUES
	(0, 'Garrus_Vakarian', 'Garrus', 'Vakarian', 'g.vakarian@n7.alliance.navy');

	DO SLEEP(2.5); # Delay Insert

INSERT INTO accounts (`id`, `username`, `forename`, `surname`, `email`)
	VALUES
	(1, 'Commander_Shepard', 'John', 'Shepard', 'j.shepard@n7.alliance.navy'),
	(2, 'Tali_Vas_Normandy', 'Tali', 'vas normandy', 't.vas_normandy@n7.alliance.navy'),
	(3, 'Legion', 'Legion', 'Consciousness grouped 1,183', 'legion@n7.alliance.navy');

	DO SLEEP(2.5); # Delay Insert

INSERT INTO accounts (`id`, `username`, `forename`, `surname`, `email`)
	VALUES
	(4, 'Dr_T\'Soni', 'Liara', 'T\'Soni', 'l.t\'soni@n7.alliance.navy'),
	(5, 'Master_Thief', 'Kasumi', 'Goto', 'k.goto@n7.alliance.navy'),
	(6, 'Prothean', 'Javik', 'Avatar', 'javik.avatar@n7.alliance.navy'),
	(7, 'Joker', 'Jeff', 'Moreau', 'jeff.moreau@n7.alliance.navy');

	DO SLEEP(2.5); # Delay Insert

INSERT INTO accounts (`id`, `username`, `forename`, `surname`, `email`)
	VALUES
	(8, 'Illusive Man', '#REDACTED#', '#REDACTED#', 'rÃ©p. non activÃ©eEC nÃ£o estÃ'),
	(9, 'Geneticist', 'Morodin', 'Solus', 'm.solus@stg.alliance.navy'),
	(10, 'Wrex', 'Urdnot', 'Wrex', 'wrex@clan.urdnot'),
	(11, 'Admiral_Anderson', 'David', 'Anderson', 'Admiral.Anderson@n7.alliance.navy'),
	(12, 'Data_Hoarder', 'Shadow', 'Broker', 'broker@unknown.net');