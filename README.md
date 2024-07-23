## Date Converter 

### About Date Converter 
<p> Date converter is an a small application to convert date DD-MM-YYYY format into roman numerals, as its a date format i kept roman numeral into the same today's date format DD-MM-YYYY. </p>

### How to use 

<p>At the initial page you will see two tabs, DateToRoman and RomanToDate. </p>

<p>On the tab  DateToRoman you must enter numbers (integer) on the right format as DD-MM-YYYY to get the roman numerals result on a today's date format (eg. XX-XX-XXXX), once you get the result and you change to RomanToDate tab you will be able to notice that the result will be on that tab input so you can convert back or add another Roman Date as you prefer. </p>

<p>On the tab RomanToDate you must enter the accepted Roamn Numerals (MDCLXVI) on the right format as DD-MM-YYYY (e.g. VI-V-XXXX) to get the converted date result on a today's date format (e.g. DD-MM-YYYY), once you get the result and you change to DateToRoman tab you will be able to notice that the result will be on that tab input so you can convert back or add another Date as you prefer.</p>


### How to Install

<p>At the first step you must clone the repo from [this GitHub link](https://github.com/marcuscolle/date-converter.git). into your preferred folder where you can serve the application.</p>

<p>Now you must open your cloned project first you need to create an .env file, copy and paste the content from .env.exemple file into it. </p>

<p>After .env is copied you go to the terminal and run the commands, composer install, then npm install, then npm run dev.</p>

<p>You can run now php artisan migrate, but on this project i have not used any migrations as this kind of application doesn't require any database integration. </p>

<p>At last stage you can serve the application running php artisan serve or depending how you server is set up you open your .test domain for example. then just follow the steps on How to use and play around the application. </p>
