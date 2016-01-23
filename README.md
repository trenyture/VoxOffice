# VoxOffice
Wait for it...

# Technologies :
HTML - Sass (with Compass) - jQuery - PHP - MySQL - Facebook app

# Description :
VoxOffice is a small project aiming for a blazing fast classification of thousands of movies.<br>
To reach this goal, YOU are the main contributor, as you can vote, add and compare all the films you want.

# How to use Git :
Command line : first you need to fork this project with the GitHub Interface ("Fork" button).<br>
Then you have to go on your profile and on the forked project "YourName/VoxOffice".<br>
Now, you can clone the forked project with the projet URL (on Github or copying this URL in your browser and adding ".git" at the end).<br>
Open your command line terminal (Git Bash on Windows) and go to the directory where you want to install it, for exemple : <code>cd C:/xampp/htdocs</code><br>
Finally, type <code>git clone URL</code><br>
Your project is now all set!<br><br>
When you finished your modifications and you want to share it with me, you have to upload it on your GitHub profile first :<br>
<code>git status</code> - to see all the modified files (reds are yet to add and greens will be added).<br>
<code>git add filename</code> - to add the modified files to the commit! For example, <code>git add style/css.css</code> or <code>git add .</code> to add all files.<br>
<code>git commit -m "Your message"</code> - to initialize the commit which will send all the documents in your GitHub profile, with a message (ex: "Header styles modification").<br>
<code>git push</code> | Send all the commit added files to your profile Github (it will ask you your Username and Password)<br>
Now you've got your files in your profile and you want to share it with me? Do a Pull Request from GitHub and I will examine your modifications before including them to the source code.<br>

# How to install Compass and use it :
Windows : download Ruby from <a href="http://rubyinstaller.org/">here</a>.<br>
Install it and *IMPORTANT* enable "Add Ruby executables to your PATH" during the installation.<br>
Then, run your terminal (Cmd/PowerShell on Windows) and type <code>gem install compass</code><br>
You just installed Compass! To use it :<br>
Go to your VoxOffice path and double click on the init.bat file. It will open a new command terminal which should stay opened as long as you edit your SCSS files.<br>
Now, you can edit every SCSS files in VoxOffice/Sass and it will automatically compile and replace the previous css files.<br>

# Enjoy and see you soon ;)