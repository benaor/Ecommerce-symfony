<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Client;
use App\Entity\Article;
use Doctrine\ORM\Query\Expr\Math;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $client = new Client();
        $client->setLogin('client')
                ->setPassword('password')
                ->setMail('client@client.com')
                ->setName('Doe')
                ->setFirstName('john')
                ->setAdress('123 street avenue')
                ->setPostalCode('12345')
                ->setCity('new-york')
                ->setPhone('0312345678');
        $encoded = $this->encoder->encodePassword($client, $client->getPassword());
        $client->setPassword($encoded);

        // dd($client);
        $manager->persist($client);

        $manager->flush();

        // $admin = new Admin();
        // $admin->setUsername('admin')
        //     ->setPassword('password');
        // $encoded = $this->encoder->encodePassword($admin, $admin->getPassword());
        // $admin->setPassword($encoded);

        // //dd($admin);
        // $manager->persist($admin);


        // for ($i = 1; $i < 10; $i++) {

        //     $u = $i - 1;
        //     $o = $i + 1;

        //     $article = new Article();
        //     $article->setTitle('Exemple article numero ' . $i)
        //         ->setIntroduction('Article numero ' . $i . ' est venu remplacer l\'article ' . $u . ' Avant d\'etre lui-meme remplacer par l\'article ' . $o)
        //         ->setDescription('Spicy jalapeno bacon ipsum dolor amet shank landjaeger kielbasa prosciutto, cow biltong fatback drumstick meatloaf ham short ribs burgdoggen corned beef bresaola venison. Short ribs rump chislic bacon frankfurter, hamburger chicken pork belly. Short ribs chuck swine rump. Leberkas t-bone chicken ground round capicola alcatra. Jerky tenderloin alcatra, brisket cow pork chop filet mignon bresaola sirloin drumstick spare ribs tail pastrami ham t-bone. Tenderloin hamburger pork loin meatloaf pork belly, doner sirloin meatball prosciutto flank. Swine leberkas rump meatloaf ground round.

        //             Ribeye shoulder turkey, flank filet mignon pork chop hamburger fatback salami rump shankle tongue leberkas. Meatloaf sirloin cow, corned beef bresaola porchetta doner brisket ham sausage shankle ball tip chicken tri-tip jerky. Biltong ball tip pig, brisket frankfurter pastrami pork shoulder leberkas sausage. Drumstick burgdoggen sausage filet mignon kevin turducken bresaola hamburger buffalo shank doner jerky turkey flank beef. Tongue alcatra pork belly pork chop. Kielbasa ball tip pastrami, ribeye pig pancetta alcatra.
                    
        //             Bacon porchetta pastrami sausage beef ribs chuck drumstick tail t-bone ham hock fatback ribeye meatloaf cupim boudin. Beef ribs ham hock pork loin pork belly tail, venison alcatra beef chuck spare ribs drumstick sausage. Cow landjaeger venison, shankle ball tip short loin leberkas jowl cupim turducken. Turkey shank cupim chuck, pork chop doner swine corned beef cow brisket boudin landjaeger ribeye tail biltong.
                    
        //             Tri-tip burgdoggen landjaeger shankle short ribs pancetta, porchetta ham hock kielbasa shank picanha jerky strip steak cow drumstick. Kevin ribeye turkey fatback bacon alcatra venison, pork chop brisket. Burgdoggen sausage cow spare ribs bacon fatback ham hock turkey swine pork. Ball tip pork belly chicken meatball bacon ground round. Burgdoggen prosciutto swine chicken frankfurter ham hock capicola ball tip salami pork cow pastrami. Tenderloin sirloin burgdoggen, pork pancetta meatball spare ribs pig brisket strip steak. Swine doner turducken jowl corned beef.')
        //         ->setImage('https://picsum.photos/seed/picsum/200/300')
        //         ->setPrice(rand(10, 1000));
        //     $manager->persist($article);
        // }

        // $manager->flush();
    }
}
