<?php
// src/AppBundle/DataFixtures/ORM/LoadBlogData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Blog;

class LoadBlogData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        	
        $title = 'lorem ipsum ';
        $description = "<p style='margin-top: 30px; margin-bottom: 30px; line-height: 1.5; font-family: Lora, &quot;Times New Roman&quot;, serif; font-size: 20px;'>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe, a round earth in which all the directions eventually meet, in which there is no center because every point, or none, is center — an equal earth which all men occupy as equals. The airman's earth, if free men make it, will be truly round: a globe in practice, not in theory.</p><p style='margin-top: 30px; margin-bottom: 30px; line-height: 1.5; font-family: Lora, &quot;Times New Roman&quot;, serif; font-size: 20px;'>Science cuts two ways, of course; its products can be used for both good and evil. But there's no turning back from science. The early warnings about technological dangers also come from science.</p><p style='margin-top: 30px; margin-bottom: 30px; line-height: 1.5; font-family: Lora, &quot;Times New Roman&quot;, serif; font-size: 20px;'>What was most significant about the lunar voyage was not that man set foot on the Moon but that they set eye on the earth.</p><p style='margin-top: 30px; margin-bottom: 30px; line-height: 1.5; font-family: Lora, &quot;Times New Roman&quot;, serif; font-size: 20px;'>A Chinese tale tells of some men sent to harm a young girl who, upon seeing her beauty, become her protectors rather than her violators. That's how I felt seeing the Earth for the first time. I could not help but love and cherish her.</p><p style='margin-top: 30px; margin-bottom: 30px; line-height: 1.5; font-family: Lora, &quot;Times New Roman&quot;, serif; font-size: 20px;'>For those who have seen the Earth from space, and for the hundreds and perhaps thousands more who will, the experience most certainly changes your perspective. The things that we share in our world are far more valuable than those which divide us.</p><h2 class='section-heading' style='font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: 700; color: rgb(51, 51, 51); margin-top: 60px; font-size: 36px;'>The Final Frontier</h2><p style='margin-top: 30px; margin-bottom: 30px; line-height: 1.5; font-family: Lora, &quot;Times New Roman&quot;, serif; font-size: 20px;'>There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p><p style='margin-top: 30px; margin-bottom: 30px; line-height: 1.5; font-family: Lora, &quot;Times New Roman&quot;, serif; font-size: 20px;'>There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p><blockquote style='color: rgb(119, 119, 119); font-style: italic; font-family: Lora, &quot;Times New Roman&quot;, serif;'>The dreams of yesterday are the hopes of today and the reality of tomorrow. Science has not yet mastered prophecy. We predict too much for the next year and yet far too little for the next ten.</blockquote><p style='margin-top: 30px; margin-bottom: 30px; line-height: 1.5; font-family: Lora, &quot;Times New Roman&quot;, serif; font-size: 20px;'>Spaceflights cannot be stopped. This is not the work of any one man or even a group of men. It is a historical process which mankind is carrying out in accordance with the natural laws of human development.</p><h2 class='section-heading' style='font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: 700; color: rgb(51, 51, 51); margin-top: 60px; font-size: 36px;'>Reaching for the Stars</h2><p style='margin-top: 30px; margin-bottom: 30px; line-height: 1.5; font-family: Lora, &quot;Times New Roman&quot;, serif; font-size: 20px;'>As we got further and further away, it [the Earth] diminished in size. Finally it shrank to the size of a marble, the most beautiful you can imagine. That beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.</p><p><img class='img-responsive' src='/assets/blog/img/post-sample-image.jpg' alt=''><span style='font-family: Lora, &quot;Times New Roman&quot;, serif; font-size: 20px;'></span><span class='caption text-muted' style='text-align: center; padding: 10px; font-style: italic; margin: 0px; display: block; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; font-family: Lora, &quot;Times New Roman&quot;, serif;'>To go places and do things that have never been done before – that’s what living is all about.</span></p><p style='margin-top: 30px; margin-bottom: 30px; line-height: 1.5; font-family: Lora, &quot;Times New Roman&quot;, serif; font-size: 20px;'>Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.</p><p style='margin-top: 30px; margin-bottom: 30px; line-height: 1.5; font-family: Lora, &quot;Times New Roman&quot;, serif; font-size: 20px;'>As I stand out here in the wonders of the unknown at Hadley, I sort of realize there’s a fundamental truth to our nature, Man must explore, and this is exploration at its greatest.</p><p style='margin-top: 30px; margin-bottom: 30px; line-height: 1.5; font-family: Lora, &quot;Times New Roman&quot;, serif; font-size: 20px;'>Placeholder text by&nbsp;<a href='http://spaceipsum.com/' style='color: rgb(51, 51, 51); text-decoration: underline;'>Space Ipsum</a>. Photographs by&nbsp;<a href='https://www.flickr.com/photos/nasacommons/' style='color: rgb(51, 51, 51); text-decoration: underline;'>NASA on The Commons</a>.</p>";
        for ($i = 0; $i <= 10; $i++)
        {

            $blog = new Blog(); 
            $blog->setTitle($title);                      
            $blog->setDescription($description);
            $blog->setCreateDate(new \DateTime()); 


            $manager->persist($blog);
            
        }

        $manager->flush();

        
    }
}
