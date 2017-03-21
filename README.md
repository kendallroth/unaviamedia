# Unavia Website

This repository is the home for the source code of my portfolio website, _unavia.ca_. It is a personal project that I will keep iterating upon as I learn new skills and tricks as a web developer. Currently it is on the fourth iteration; each iteration progressively becoming *more* modern and responsive.

For the current display of updates, please view the [CHANGELOG](CHANGELOG.md).

## Features
The site displays several of the skills I have learned/am learning, including the following:
- Front-End
	- HTML5, [SASS](http://sass-lang.com), JavaScript
- Back-End
	- PHP, MySQL
- Frameworks
	- [Foundation 6](//foundation.zurb.com)
- Project Management
	- [Git](//git-scm.com), [Gulp](//gulpjs.com), [Ansible](//ansible.com)

## Setup
Clone project onto a **Ubuntu 16.04** server and manually run the `.provision/bootstrap.sh` script to setup.

### Security Note:
For security reasons, there is an additional file that **must** be created in the folder containing web root that will store several security/custom variables.

The file should be called "**custom_constants.php**" and be contain the following constants and values:

| Constant | Description | Example |
| :------- | :---------- | :------ |
| `DB_HOST`				| Database host | `localhost` |
| `DB_USER`				| User to log into database as | `test` |
| `DB_PASSWORD`		| Password for database user | `*******` |
| `DB_NAME`				| Name of database to use | `blog_db` |
| `MAIL_ADDRESS`  		| Email address that mail will appear to come from | `test@example.com` |
| `SMTP_HOST`     		| SMTP host server address | `smtp.gmail.com` |
| `SMTP_PORT`     		| SMTP port number | `234` |
| `SMTP_USERNAME` 		| SMTP authentication username | `email@gmail.com` |
| `SMTP_PASSWORD` 		| SMTP authentication password | `test1234` |
| `RECAPTCHA_SITE`		| ReCAPTCHA public site authentication key | 6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI |
| `RECAPTCHA_SECRET`	| ReCAPTCHA secure authentication key | 6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe |
