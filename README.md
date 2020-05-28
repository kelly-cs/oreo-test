# oreo-test
Testing out the Oreo PHP Library for StarCraft: Remastered

# REQUIREMENTS:
The Oreo PHP library http://www.staredit.net/topic/15156/
PHP 5.5 or Higher https://www.php.net/downloads.php

# USAGE:
A local PHP server must be created to utilize Oreo. This is bundled in by default with the current version of PHP.
- Create a project by simply creating a php file with the header:
```
<?php include($_SERVER['DOCUMENT_ROOT'] . "/directory/to/your/oreo/library/initialize.php");
```
and the footer:
```
?>
```
All Oreo Code will be written inbetween (this is what will be compiled into SC triggers)
Use the editor of your choice to create your Oreo PHP scripts.

To compile a script, simply run a PHP instance directed at your project PHP like so:

POWERSHELL (If you don't have PHP PATH set up, navigate to your folder with PHP in it. Otherwise, just typing "php" should work.)
```
./php.exe -S localhost:8000 directory/to/your/project/project.php
```
Once completed, visiting the link in your browser should create an output to be copied into SCMDraft's trigger editor. By using Mint, which is included with Oreo, we can automated this process later by taking an INPUT .SCX, compiling code through Oreo, and then outputting automatically to an OUTPUT .SCX through Mint. This helps keep your workflow in your IDE as much as possible - I'll document this more when I get around to using it.


For specific usage, please see the Oreo documentation linked above. This allows standard EUD memory controls and some extra premade bonuses like keypress detection, and chatbox detection. More could likely be added in the future for ease of use (perhaps more CUnit-related stuff, or CText?)

I imagine this would allow for designing modular projects that can be reused later - this should be especially useful when creating EUD scripts for niche purposes. 
