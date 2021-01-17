create database mytrips;

use mytrips;

create table places (
	place varchar(100) NOT NULL,
	description varchar(1200) NOT NULL,
	url varchar(400) NOT NULL,
	firstname varchar(100) NOT NULL,
	lastname varchar(100),
	email varchar(100),
	entry_date DATE DEFAULT (CURRENT_DATE)	,
	visit_year SMALLINT(4)
	);

INSERT INTO places(place, description, url, firstname, lastname, email, entry_date, visit_year)
VALUES ("Zagreb", "Zagreb ist die Hauptstadt und die größte Stadt Kroatiens. Als Handels- und Finanzzentrum hat die Stadt nationale und regionale Bedeutung. Ich war dort im Herbst 2020. Das Wetter war top. Die Clubs waren offen und überfüllt, jedoch nur mässig von der Qualität her. Die Restaurants in der Altstadt sind sehr empfehlenswert.", "https://wallpapercave.com/wp/wp2333658.jpg", "Jole", "C", "jole@c.com", "2020-12-20", "2020");

INSERT INTO places(place, description, url, firstname, lastname, entry_date)
VALUES ("Ivanic Grad", "Ländliche Stadt. Hat nicht viel zu bieten. Jedoch ist die Pizzaria Roso sehr empfehlenswert. Sie macht vermutlich die besten Pizzas Kroatiens.", "https://www.visitzagrebcounty.hr/wordpress/wp-content/uploads/2013/09/promo-ivanicgrad-480x246.jpg", "Darko", "Simic", "2020-12-18");

INSERT INTO places(place, description, url, firstname, email, entry_date)
VALUES ("Zadar", "Zadar, a city on Croatia’s Dalmatian coast, is known for the Roman and Venetian ruins of its peninsular Old Town. There are several Venetian gates in the city walls. Surrounding the Roman-era Forum is 11th-century St. Mary’s Convent, with religious art dating to the 8th century. There’s also the grand, 12th-century St. Anastasia’s Cathedral and the round, 9th-century pre-Romanesque Church of St. Donatus.", "https://c4.wallpaperflare.com/wallpaper/743/708/965/zadar-likecroatia-full-hd-wallpapers-1080p-wallpaper-preview.jpg", "Maxwell", "max.dunningham@yahoo.com", "2020-12-22");

INSERT INTO places(place, description, url, firstname, entry_date, visit_year)
VALUES ("Banja Luka", "Its not in Croatia, but I still wanted to post it here. Best City in the region of Balkan. It draws a lot of attention from the locals because it is know for its delicious cevapcici. The place is also most inhabited by serbians. Therefor watch out if you're from another country.", "https://i.pinimg.com/originals/91/05/7f/91057f4f504ed5ac7ff20ae59eb57dc3.jpg", "Milos", "2020-12-23", "2017");






