
## BoostOrder Project
**[Website Link](https://boostorder.garrick.monster)**

## Design Structure 
- Using MVC Framework Codeigniter 3
- Login Session using JWT token instead of $_SESSION, faster save memory
- Basic Order function 
- Admin link go to `/admin/dashboard`
- Assuming admin is built separately, assume is login. Future can build with different admin id so that different vendor can join in
- Push notifications wasnt built but as stated in the video , firebase can be use.

## Technology & Framework
- [PHP 7](https://www.php.net/) with [Codeigniter 3](https://codeigniter.com/) Framework.

- Database is constructed using [MySql](https://www.mysql.com/).  

- Server Engine Apache 

- The UI Design is using [Boostrap Material](https://mdbootstrap.com/)

## Plugin Used

**Core**
	Details refer to package.json 

**Extra**  

- [Boostrap Notify](http://bootstrap-notify.remabledesigns.com/)
- Animate CSS

**Icon Used**
- [Font Awesome 5](https://fontawesome.com/)


## Code Structure
The project is built using MVC (Model View Controller) Structure.
`application/library/boost.php` is act as the backbone of this project.

The main view files will be `application\views\main.php`

## Installation

You can clone or download the file to your respective directory. Make sure your **PHP version is 7 and above**.

- Run Composer

```sh
composer install
```
- Extract `dummy.sql` to your database
- Rename `.env.example` to `.env`
- Edit your environment variable at `.env`  
- Rename  `.htaccess.example`  to `.htaccess`
- Run the server

