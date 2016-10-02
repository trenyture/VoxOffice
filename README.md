# VoxOffice
All your favorites movies, classified.

# Technologies :
HTML - Sass (with Compass) - jQuery - PHP - MySQL - Facebook app

# Description :
VoxOffice is a small project aiming for a blazing fast classification of thousands of movies.<br>
To reach this goal, YOU are the main contributor, as you can vote, add and compare all the films you want.

# How to use Git :
Command line :<br><br>
1. First, you need to fork this project with the GitHub Interface ("Fork" button).<br>
2. Then you have to go on your profile and on the forked project "YourName/VoxOffice". Now, you can clone the forked project with the projet URL (on Github or copying this URL in your browser and adding ".git" at the end).<br><br>
3. Open your command line terminal (Git Bash on Windows) and go to the directory where you want to install it, for exemple : <code>cd C:/xampp/htdocs</code><br>
4. Finally, type <code>git clone URL</code>. Your project is now all set!<br><br>
When you finished your modifications and you want to share it with me, you have to upload it on your GitHub profile first :<br>
1. <code>git status</code> - to see all the modified files (reds are yet to add and greens will be added).<br>
2. <code>git add filename</code> - to add the modified files to the commit! For example, <code>git add style/css.css</code> or <code>git add .</code> to add all files.<br>
3. <code>git commit -m "Your message"</code> - to initialize the commit which will send all the documents in your GitHub profile, with a message (ex: "Header styles modification").<br>
4. <code>git pull</code> - to update possibles changes on the repo online.<br>
5. <code>git push</code> | Send all the commit added files to your profile Github (it will ask you your Username and Password)<br>

# How to install Compass and use it :
Compass is a CSS framework used to compile and add useful mixins to your SCSS.<br><br>
1. (Windows) Download Ruby from <a href="http://rubyinstaller.org/">here</a>.<br>
2. Install it and *IMPORTANT* enable "Add Ruby executables to your PATH" during the installation.<br>
3. Then, run your terminal (Cmd/PowerShell on Windows) and type <code>gem install compass</code><br><br>
You just installed Compass! To use it :<br><br>
Go to your VoxOffice path and double click on the init.bat file. It will open a new command terminal which should stay opened as long as you edit your SCSS files.<br><br>
Now, you can edit every SCSS files in VoxOffice/Sass and it will automatically compile and replace the previous css files.<br>

# Enjoy and see you soon ;)