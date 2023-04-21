<h2>About</h2>
<p>This is a Library project created with Laravel 9 framework and VueJS</p>


<h2>How to run it</h2>

Follow the steps below to install it on your local device

<ul>
<li>clone the repo on your local device</li>
<li>cd to the root of project code</li>
<li>run the following commands:</li>
<li><code>$ composer install</code></li>
<li><code>$ npm install</code></li>
<li><code>$ php artisan migrate:fresh --seed</code> (this is to run migrations and seed the database)</li>
<li><code>$ npm run dev</code> (keep this running)</li>
<li>open a new console/terminal tab or window and cd to the root of project code. then run the following command</li>
<li><code>$ php artisan server</code></li>
</ul>

<p>It would give you a url to access the website through your browser. The url looks like:
http://localhost:8000 or http://127.0.0.1:8000</p>
<p>If you open this url in your browser you would be able to see the project and play around with it</p>


<h4>Notes:</h4>
<ul>
<li>I've already commited the <code>.env</code> file to the repo. This is not a good practice and there is security measures involved in doing this. But becuase this is just a demo project and I want make your life easier to get it setup and running, I've done this. I'm aware of all the security measures in this regard.</li>
<li>I've currently set the code to use sqlite database connection which is a local file storage acting as database. I've done this to make setting up easier and not relying on setting up MySql or Postgress database. So no database setup is required. If you want you can simply change the connection in <code>.env</code> file and link it to MySql or whatever database engine you like.</li>
<li>I've also currently commited <code>database.sqlite</code> file which is the database file. Currently it's blank and no data in it. But it will populate as soon as you run the commands above. Also I know this is a security measure and it's not a good practice to coomit database in the repo but I've done this to make setting it up easier withou hassle of creating the file manually. I've done this because this is just a demo project.</li>
</ul>


<p>
Please do not hesitate to contact me if you require further info on this. My email address is: mo.baqeri1987@gmail.com</p>

Thank you for checking this repo out.