# ---------------------------------------------------------------------- #
# Target DBMS:           MySQL 5                                         #
# Project name:          Portfolio                                       #
# Created on:            2016-03-02                                      #
# ---------------------------------------------------------------------- #

CREATE DATABASE IF NOT EXISTS dgPortfolio;

USE dgPortfolio;

# ---------------------------------------------------------------------- #
# Tables                                                                 #
# ---------------------------------------------------------------------- #
# ---------------------------------------------------------------------- #
# Add table "contact"                                                    #
# ---------------------------------------------------------------------- #

CREATE TABLE contact (
    contactID INTEGER NOT NULL AUTO_INCREMENT,
    fullName VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    message text NOT NULL,
	PRIMARY KEY (contactID)
);

INSERT INTO contact (fullName, phone, email, message)  
	VALUES ('Stanley Kubrick', '732-111-1212', 'skubrick@gmail.com', 'This is my first test message');

# ---------------------------------------------------------------------- #
# Add table "project_category"                                           #
# ---------------------------------------------------------------------- #

CREATE TABLE project_category (
    pcatgID INTEGER NOT NULL AUTO_INCREMENT,
    pcatg VARCHAR(50) NOT NULL,
	PRIMARY KEY (pcatgID)
);

INSERT INTO project_category (pcatg)  
	VALUES ('Javascript');
INSERT INTO project_category (pcatg)  
	VALUES ('Dreamweaver');
INSERT INTO project_category (pcatg)  
	VALUES ('JavaPrograms');
INSERT INTO project_category (pcatg)  
	VALUES ('PHPmySQL');

# ---------------------------------------------------------------------- #
# Add table "projects"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE projects (
    prjID INTEGER NOT NULL AUTO_INCREMENT,
    pcatgID INTEGER NOT NULL,
    ptitle VARCHAR(50) NOT NULL,
    pdesc VARCHAR(50) NOT NULL,
    pfileName VARCHAR(100) NOT NULL,
	PRIMARY KEY (prjID),
	FOREIGN KEY (pcatgID) REFERENCES project_category (pcatgID)
	ON DELETE no action ON UPDATE no action
) engine = INNODB;

INSERT INTO projects (pcatgID, ptitle, pdesc, pfileName)  
	VALUES ('1','shell', 'shell game', 'jsprojs/shell/html/game.html');
INSERT INTO projects (pcatgID, ptitle, pdesc, pfileName)  
	VALUES ('1','magic8', 'magic8 game', 'jsprojs/magic8/html/pjs-magic.html');
INSERT INTO projects (pcatgID, ptitle, pdesc, pfileName)  
	VALUES ('2','Final2015', 'COMP140 Final Project', 'dwprojs/Final2015/page1.html');
INSERT INTO projects (pcatgID, ptitle, pdesc, pfileName)  
	VALUES ('2','Midterm', 'COMP140 Midterm Project', 'dwprojs/midterm/index.html');
INSERT INTO projects (pcatgID, ptitle, pdesc, pfileName)  
	VALUES ('4','PizzaOrder', 'Pizza Order Form', 'phpprojs/lab8/pizzaForm.html');


# ---------------------------------------------------------------------- #
# Add table "gallery"                                                    #
# ---------------------------------------------------------------------- #

CREATE TABLE gallery (
    galID INTEGER NOT NULL AUTO_INCREMENT,
    gtitle VARCHAR(50) NOT NULL,
	PRIMARY KEY (galID)
);

INSERT INTO gallery (gtitle)
	VALUES ('Photography');
INSERT INTO gallery (gtitle)
	VALUES ('Drawing');
INSERT INTO gallery (gtitle)
	VALUES ('Painting');
INSERT INTO gallery (gtitle)
	VALUES ('2D3D');
INSERT INTO gallery (gtitle)
	VALUES ('Flash');

# ---------------------------------------------------------------------- #
# Add table "portfolio_items"                                            #
# ---------------------------------------------------------------------- #

CREATE TABLE portfolio_items (
    itemID INTEGER NOT NULL AUTO_INCREMENT,
    galID INTEGER NOT NULL,
    ititle VARCHAR(50) NOT NULL,
    idesc VARCHAR(120),
    ifileName VARCHAR(100) NOT NULL,
	PRIMARY KEY (itemID),
	FOREIGN KEY (galID) REFERENCES gallery (galID)
	ON DELETE no action ON UPDATE no action
) engine = INNODB;

INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('1', 'photo1', 'my photo', 'photo1.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('1', 'photo2', 'my photo2', 'photo2.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint1', 'thumbsize softbrush painting', 'painting/th/paint1.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint2', 'thumbsize shading painting', 'painting/th/paint2.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint3', 'thumbsize rgb_colorwheel', 'painting/th/paint3.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint4', 'thumbsize ryb_colorwheel', 'painting/th/paint4.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint5', 'thumbsize balance painting', 'painting/th/paint5.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint6', 'thumbsize landscape_roughpastel', 'painting/th/paint6.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint7', 'thumbsize mypopart', 'painting/th/paint7.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint8', 'thumbsize photomontage', 'painting/th/paint8.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint9', 'thumbsize background painting', 'painting/th/paint9.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint10', 'thumbsize ryb_colorwheel_liquify', 'painting/th/paint10.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint11', 'thumbsize still_life_coloredpencil', 'painting/th/paint11.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint12', 'thumbsize landscape_dg painting', 'painting/th/paint12.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint1_large', 'softbrush painting', 'painting/softbrush_dg.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint2_large', 'shading painting', 'painting/shading_dg.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint3_large', 'rgb_colorwheel', 'painting/rgb_colorwheel.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint4_large', 'ryb_colorwheel', 'painting/ryb_colorwheel.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint5_large', 'balance painting', 'painting/balance_dg.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint6_large', 'landscape_roughpastel', 'painting/landscape_roughp.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint7_large', 'mypopart', 'painting/mypopart.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint8_large', 'photomontage', 'painting/photomontage.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint9_large', 'background painting', 'painting/background_dg.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint10_large', 'ryb_colorwheel_liquify painting', 'painting/ryb_colorwheel_dg.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint11_large', 'still_life_coloredpencil painting', 'painting/still_life_dg_coloredpencil.jpg');
INSERT INTO portfolio_items (galID, ititle, idesc, ifileName )
	VALUES ('3', 'paint12_large', 'landscape painting', 'painting/landscape_dg.jpg');
