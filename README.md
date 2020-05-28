# oreo-test
Testing out the Oreo PHP Library for StarCraft: Remastered

The Oreo PHP library http://www.staredit.net/topic/15156/

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

For specific usage, please see the Oreo documentation linked above. This allows standard EUD memory controls and some extra premade bonuses like keypress detection, and chatbox detection. More could likely be added in the future for ease of use (perhaps more CUnit-related stuff, or CText?)

