-- auth_assignment table
INSERT INTO public.auth_assignment (item_name, user_id, created_at) VALUES ('theCreator', 1, 1528608372);
INSERT INTO public.auth_assignment (item_name, user_id, created_at) VALUES ('superadmin', 3, null);
INSERT INTO public.auth_assignment (item_name, user_id, created_at) VALUES ('adminOpd', 2, null);

-- auth_item table
INSERT INTO public.auth_item (name, type, description, rule_name, data, created_at, updated_at) VALUES ('theCreator', 1, 'You!', null, null, 1528608270, 1528608270);
INSERT INTO public.auth_item (name, type, description, rule_name, data, created_at, updated_at) VALUES ('adminOpd', 1, 'Registered users, members of this site', null, null, 1528608270, 1528608270);
INSERT INTO public.auth_item (name, type, description, rule_name, data, created_at, updated_at) VALUES ('superadmin', 1, 'Administrator of this application', null, null, 1528608270, 1528608270);

-- auth_item_child table
INSERT INTO public.auth_item_child (parent, child) VALUES ('theCreator', 'superadmin');

-- auth_rule table


-- migration table


-- session table
INSERT INTO public.session (expire, data)
VALUES ('i84cermbp9vghm2a5spugf1kf0                                      ', 1571677218, '__flash|a:0:{}');

-- user table
INSERT INTO public."user" (username, email, password_hash, status, auth_key, password_reset_token,
                           account_activation_token, created_at, updated_at)
VALUES (1, 'syauqi', 'syauqi@pens.ac.id', '$2y$13$ajrfoq38lUjjH0FZ28Snje1h4YCLiLIBfRmOBOkFlGOYilAgDI.NK', 10,
        'oGK5W1zbr9dJvpl4w77AMjZR6jaZtUF5', null, null, 1528608372, 1528608372);


-- frontend_counter_user
INSERT INTO public.frontend_counter_users (user_ip, user_time) VALUES ('837ec5754f503cfaaee0929fd48974e7', 1571675778);

-- frontend_counter_save table
INSERT INTO public.frontend_counter_save (save_name, save_value) VALUES ('max_count', 1);
INSERT INTO public.frontend_counter_save (save_name, save_value) VALUES ('max_time', 1533211200);
INSERT INTO public.frontend_counter_save (save_name, save_value) VALUES ('yesterday', 0);
INSERT INTO public.frontend_counter_save (save_name, save_value) VALUES ('counter', 9);
INSERT INTO public.frontend_counter_save (save_name, save_value) VALUES ('day_time', 2458778);


-- Urusan table
INSERT INTO public.urusan (nama) VALUES ('Pendidikan');
INSERT INTO public.urusan (nama) VALUES ('Kesehatan');
INSERT INTO public.urusan (nama) VALUES ('Pekerjaan Umum dan Penataan Ruang');
INSERT INTO public.urusan (nama) VALUES ('Perumahan Rakyat dan Kawasan Permukiman');
INSERT INTO public.urusan (nama) VALUES ('Tribumlinmas');
INSERT INTO public.urusan (nama) VALUES ('Sosial');
INSERT INTO public.urusan (nama) VALUES ('Pemberdayaan Perempuan dan Perlindungan Anak');
INSERT INTO public.urusan (nama) VALUES ('Tenaga Kerja');
INSERT INTO public.urusan (nama) VALUES ('Transmigrasi');
INSERT INTO public.urusan (nama) VALUES ('Penanaman Modal');
INSERT INTO public.urusan (nama) VALUES ('Pangan');
INSERT INTO public.urusan (nama) VALUES ('Pertanian');
INSERT INTO public.urusan (nama) VALUES ('Kelautan dan Perikanan');
INSERT INTO public.urusan (nama) VALUES ('Pertanahan');
INSERT INTO public.urusan (nama) VALUES ('Lingkungan Hidup');
INSERT INTO public.urusan (nama) VALUES ('Administrasi Kependudukan dan Pencatatan Sipil');
INSERT INTO public.urusan (nama) VALUES ('Pemberdayaan Masyarakat dan Desa');
INSERT INTO public.urusan (nama) VALUES ('Pengendalian Penduduk dan Keluarga Berencana');
INSERT INTO public.urusan (nama) VALUES ('Perhubungan');
INSERT INTO public.urusan (nama) VALUES ('Komunikasi dan Informatika');
INSERT INTO public.urusan (nama) VALUES ('Koperasi, Usaha Kecil dan Menengah');
INSERT INTO public.urusan (nama) VALUES ('Perindustrian');
INSERT INTO public.urusan (nama) VALUES ('Perdagangan');
INSERT INTO public.urusan (nama) VALUES ('Kepemudaan dan Olah Raga');
INSERT INTO public.urusan (nama) VALUES ('Kebudayaan');
INSERT INTO public.urusan (nama) VALUES ('Pariwisata');
INSERT INTO public.urusan (nama) VALUES ('Perpustakaan');
INSERT INTO public.urusan (nama) VALUES ('Kearsipan');
INSERT INTO public.urusan (nama) VALUES ('Bidang Perencanaan');
INSERT INTO public.urusan (nama) VALUES ('Bidang Penelitian dan Pengembangan');
INSERT INTO public.urusan (nama) VALUES ('Bidang Kepegawaian dan Diklat');
INSERT INTO public.urusan (nama) VALUES ('Bidang Keuangan');
INSERT INTO public.urusan (nama) VALUES ('Bidang Pengawasan');

-- OPD table
INSERT INTO public.opd (nama) VALUES ('Dinas Pendidikan');
INSERT INTO public.opd (nama) VALUES ('Dinas Kesehatan');
INSERT INTO public.opd (nama) VALUES ('Dinas Pekerjaan Umum dan Penataan Ruang');
INSERT INTO public.opd (nama) VALUES ('Dinas Perumahan Rakyat dan Kawasan Permukiman');
INSERT INTO public.opd (nama) VALUES ('Badan Penanggulangan Bencana Daerah');
INSERT INTO public.opd (nama) VALUES ('Satuan Polisi Pamong Praja');
INSERT INTO public.opd (nama) VALUES ('Kantor Kesatuan Bangsa dan Politik');
INSERT INTO public.opd (nama) VALUES ('Dinas Sosial, Pemberdayaan Perempuan dan Perlindungan Anak');
INSERT INTO public.opd (nama) VALUES ('Dinas Penanaman Modal, PTSP, dan Tenaga Kerja');
INSERT INTO public.opd (nama) VALUES ('Dinas Pertanian dan Ketahanan Pangan');
INSERT INTO public.opd (nama) VALUES ('Dinas Perikanan dan Peternakan');
INSERT INTO public.opd (nama) VALUES ('Sekretariat Daerah');
INSERT INTO public.opd (nama) VALUES ('Dinas Lingkungan Hidup');
INSERT INTO public.opd (nama) VALUES ('Dinas Kependudukan dan Pencatatan Sipil');
INSERT INTO public.opd (nama) VALUES ('Dinas Pemberdayaan Masyarakat dan Desa, dan Keluarga Berencana');
INSERT INTO public.opd (nama) VALUES ('Dinas Perhubungan');
INSERT INTO public.opd (nama) VALUES ('Dinas Komunikasi dan Informatika');
INSERT INTO public.opd (nama) VALUES ('Dinas Koperasi, Perindustrian dan Perdagangan');
INSERT INTO public.opd (nama) VALUES ('Dinas Pariwisata, Kebudayaan, Pemuda dan Olahraga');
INSERT INTO public.opd (nama) VALUES ('Dinas Perpustakaan dan Kearsipan');
INSERT INTO public.opd (nama) VALUES ('Badan Perencanaan Pembangunan Daerah');
INSERT INTO public.opd (nama) VALUES ('Badan Kepegawaian Daerah');
INSERT INTO public.opd (nama) VALUES ('Badan Pendapatan, Pengelolaan Keuangan dan Aset Daerah');
INSERT INTO public.opd (nama) VALUES ('Inspektorat');


-- urusan_opd table
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (1, 1);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (2, 2);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (3, 3);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (4, 4);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (5, 5);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (5, 6);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (5, 7);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (6, 8);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (7, 8);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (8, 9);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (9, 9);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (10, 9);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (11, 10);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (12, 10);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (13, 11);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (14, 12);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (15, 13);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (16, 14);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (17, 15);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (18, 15);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (19, 16);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (20, 17);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (21, 18);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (22, 18);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (23, 18);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (24, 19);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (25, 19);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (26, 19);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (27, 20);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (28, 20);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (29, 21);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (30, 21);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (31, 22);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (32, 23);
INSERT INTO public.urusan_opd (urusan_id, opd_id) VALUES (33, 24);