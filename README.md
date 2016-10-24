A Symfony project created on October 22, 2016, 4:03 pm.d

# SETUP
1 Run command:      git clone https://github.com/eyeoftigers/Symfony-Blog.git

2 go to Symfony-Blog direcotry in CMD

3 Run command:     composer update

4 Run command:     php bin/console doctrine:database:create

5 Run command:     php bin/console doctrine:schema:update --force

6 Run command:     php bin/console doctrine:fixtures:load


7 Run command:     bower install

8 Run command:     php bin/console server:run

Go to http://139.59.215.161/register , register a new admin. Click create to write new blog.

# Or login with already regiser admin

  URL   http://19.59.215.161/login
  USER  admin@admin.com
  PASS  admin@admin.com

# Hosting  

  Hosted on DigitalOcean ubunto/ Lamp Stack  http://139.59.215.161/
  Some link seem not working on above host will fix later
  Fixed * .Linux file system is Case sensitive unlike Windows.(View were called as index.html.twig in Controller while the view name was
  Index.html.twig , notice the small i and big I ) 
