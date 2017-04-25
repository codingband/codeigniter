
INSERT INTO `role` (`role_id`, `role_name`, `role_description`, `default_login_page`) VALUES
(1, 'admin', NULL, NULL);

INSERT INTO `user_status` (`user_status_id`, `user_status_name`) VALUES
(1, 'inactive'),
(2, 'active');

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `username`, `password`, `password_salt`, `activation_code`, `created_on`, `role_id`, `user_status_id`, `country_code`, `state_code`, `region_id`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', '$P$BJUHrob2LHZtg5anZ4NEclpfpKuCcr0', '4fff4f0f91950', '0', '2012-07-10 07:58:27', 1, 2, NULL, NULL, NULL);





INSERT INTO `core`.`facebook_user` (`facebook_user_id`, `facebook_id`, `facebook_username`, `facebook_name`, `facebook_token`, `page_fan`, `date_subcription`, `first_name`, `last_name`, `email`, `birthdate`, `dni`, `send_post`, `send_email`, `user_status`) VALUES 
(1, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 1),
(2, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 2),
(3, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 1),
(4, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 2),
(5, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 1),
(6, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 2),
(7, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 1),
(8, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 2),
(9, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 1),
(10, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 2),
(11, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 1),
(12, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 2),
(13, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 1),
(14, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 2),
(15, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 1),
(16, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 2),
(17, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 1),
(18, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 2),
(19, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 1),
(20, '100', 'juan perez', 'juan', '55555', 1, '2012-07-10 07:58:27', 'juan', 'perez', 'juan@gmail.com', '2000-07-10', '55555', '0', '0', 2);

INSERT INTO `publication` (`publication_id` , `title` , `description` , `photo` , `link` , `date` , `status` , `user_id`)
VALUES 
( 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',  'Proin sagittis pulvinar congue. Nullam lacus arcu, varius eget auctor nec, porttitor et ligula. Aliquam laoreet odio sit amet turpis',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 2, 'Curabitur sodales nulla at justo facilisis consectetur.',  'vehicula consequat. Mauris varius pulvinar feugiat. In a urna et justo accumsan ultricies quis quis tortor. Fusce at velit eget ',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 3, 'Integer viverra auctor turpis, et ornare erat semper eu.',  'lectus imperdiet tristique. Vestibulum blandit magna id velit fermentum eu imperdiet elit accumsan. Sed metus risus, dapibus',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 4, 'Nunc condimentum ultricies orci, ut semper urna tristique vitae.',  'non euismod quis, facilisis sit amet sem. Aliquam ornare bibendum enim nec ornare. Pellentesque molestie massa in mi mattis',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 5, 'Donec sagittis lorem id augue venenatis tincidunt.',  'luctus. Suspendisse et nibh orci. Maecenas euismod augue eget tellus aliquet porta. ',  '',  '', '2012-07-10 07:58:27', 1, 1),
( 6, 'Nam faucibus urna quis augue aliquam pulvinar.',  'Suspendisse posuere, diam id vehicula mollis, diam neque dignissim enim, et suscipit nulla est et neque. Proin eu neque elit, ut',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 7, 'Aliquam quis elit eget lectus hendrerit ornare.',  'hendrerit neque. Aenean eu ligula ac ante fermentum iaculis. Nunc elementum quam ac quam fringilla eleifend. Integer dictum,',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 8, 'Ut vel velit et sem aliquam volutpat.',  'arcu at blandit ultrices, lectus ante mattis magna, vitae lobortis erat sem fringilla orci. Aliquam eu libero eget purus accumsan ',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 9, 'Sed lacinia convallis mauris, sit amet dapibus justo convallis vitae.',  'convallis in vel quam. Mauris sollicitudin semper magna, in luctus enim tincidunt ac. Etiam ornare, odio at elementum pretium,',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 10, 'Vestibulum semper lacus quis risus blandit condimentum.',  'augue nisl tincidunt odio, vel suscipit turpis libero ut massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, ',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 11, 'Donec congue imperdiet massa, in ornare sapien tempor id.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 12, 'Curabitur non nisl ut ipsum euismod cursus vel ut neque.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 13, 'Sed molestie nisl viverra libero gravida at viverra velit placerat.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '01.jpg', '2012-07-10 07:58:27', 1, 1),
( 14, 'Pellentesque aliquam posuere risus, eu ultricies odio blandit sit amet.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 15, 'Nulla nec ante erat, sit amet tincidunt turpis.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 16, 'Nam ut lectus sapien, ac tempus ligula.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 17, 'Nullam vehicula turpis et nisl commodo porta.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 18, 'Nam aliquam nunc ac risus imperdiet in vulputate ante consequat.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 19, 'Donec semper eros laoreet mi cursus dignissim.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 20, 'Curabitur ut sapien mi, eget tincidunt dolor.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 21, 'Praesent blandit semper mi, non fermentum erat porttitor at.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '',  '', '2012-07-10 07:58:27', 1, 1),
( 22, 'Nulla nec tortor id lorem tincidunt varius.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 23, 'Integer tempus enim id dolor consequat ullamcorper.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 24, 'Pellentesque ac metus lectus, quis tincidunt felis.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 25, 'Donec at nulla ac diam auctor pharetra non vel sapien.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 26, 'Nunc suscipit eros vel orci molestie mattis.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 27, 'Nam condimentum felis risus, a porttitor leo.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 28, 'Nam vel felis aliquet ante faucibus accumsan eget in elit.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 29, 'Sed eu lacus felis, eu sollicitudin tortor.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1),
( 30, 'Donec iaculis erat sit amet orci aliquam ut vulputate eros lobortis.',  'per inceptos himenaeos. Ut ut risus odio. Aliquam faucibus mattis arcu ut aliquam. Suspendisse auctor viverra urna nec',  '01.jpg',  '', '2012-07-10 07:58:27', 1, 1);

INSERT INTO `video` (`video_id`, `title`, `url`, `order_number`, `date`, `status`, `user_id`) 
VALUES
 
( 1, 'Lorem1 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo1', 54321 , '2012-07-19 12:29:56' , '1', 1),
( 2, 'Lorem2 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo2', 54321 , '2012-07-19 12:29:56' , '2', 1),
( 3, 'Lorem3 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo3', 54321 , '2012-07-19 12:29:56' , '2', 1),
( 4, 'Lorem4 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo4', 54321 , '2012-07-19 12:29:56' , '2', 1),
( 5, 'Lorem5 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo5', 54321 , '2012-07-19 12:29:56' , '1', 1),
( 6, 'Lorem6 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo6', 54321 , '2012-07-19 12:29:56' , '2', 1),
( 7, 'Lorem7 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo7', 54321 , '2012-07-19 12:29:56' , '1', 1),
( 8, 'Lorem8 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo8', 54321 , '2012-07-19 12:29:56' , '2', 1),
( 9, 'Lorem9 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo9', 54321 , '2012-07-19 12:29:56' , '1', 1),
( 10, 'Lorem10 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo10', 54321 , '2012-07-19 12:29:56' , '2', 1),
( 11, 'Lorem11 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo11', 54321 , '2012-07-19 12:29:56' , '1', 1),
( 12, 'Lorem12 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo12', 54321 , '2012-07-19 12:29:56' , '2', 1),
( 13, 'Lorem13 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo13', 54321 , '2012-07-19 12:29:56' , '1', 1),
( 14, 'Lorem14 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo14', 54321 , '2012-07-19 12:29:56' , '2', 1),
( 15, 'Lorem15 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo15', 54321 , '2012-07-19 12:29:56' , '1', 1),
( 16, 'Lorem16 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo16', 54321 , '2012-07-19 12:29:56' , '2', 1),
( 17, 'Lorem17 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo17', 54321 , '2012-07-19 12:29:56' , '1', 1),
( 18, 'Lorem18 ipsum dolor sit amet consectetur adipiscing elit.', 'http://www.google.com.bo18', 54321 , '2012-07-19 12:29:56' , '2', 1);


