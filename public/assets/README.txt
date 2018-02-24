

    <img src="/assets/img/{{ $page->images }}" style="height:50px" alt="">
</div>
************************************{{Form::open(['class' => 'confirm-delete', 'route' => ['topic', $item->id], 'method' => 'GET'])}}
                                    {{-- link_to_route('pages.index', 'topic', [$item->id], ['class' => 'btn btn-success btn-xs']) --}}
                                    {{Form::button('TOPIC', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                    {{Form::close()}}
*****or
            <a class="" href="{{ route('topic', array('alias' => $item->id)) }}"><i class="fa fa-info-circle" style = "font-size: 120px; padding-bottom: 0px;"></i></a>
            *******************************

$mgClient = new Mailgun('key-XXX');
$domain = "domain.com";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'fromname mailgun@domain.com',
    'to'      => 'to@gmail.com',
    'subject' => 'Hello',
    'text'    => 'Testing some Mailgun awesomness!'
));

In your project's _config/config.yml file:

MailgunMailer:
  api_key: 'key-goes-here'
  api_domain: 'verified-domain'
In your project's _config.php file:

Injector::inst()->registerService(new MailgunMailer(), 'Mailer');
or:

// Send email through Mailgun in live environment only
if (Director::isLive()) {
	Injector::inst()->registerService(new MailgunMailer(), 'Mailer');
}


INSERT INTO portfolios VALUES (1, 'Android', 'android', 'portfolio_pic8.jpg', '','', ''), (2, 'Nexus Phone', 'web', 'portfolio_pic7.jpg', '','', ''), (3, 'iPhone', 'web', 'portfolio_pic6.jpg', '', '',''), (4, 'Managment', 'designe', 'portfolio_pic5.jpg', '', '',''), (5, 'Shopping', '', 'portfolio_pic4.jpg', '', '',''), (6, 'GPS Concept', 'designe', 'portfolio_pic3.jpg', '','', ''), (7, 'Finance App', 'designe', 'portfolio_pic2.jpg', '','', ''), (8, 'SMS Mobile App', 'appleOS', 'portfolio_pic1.jpg', '','', '')

UPDATE `services` SET `text` = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.', `icon` = `fa-apple`, `created_at` = NULL, `updated_at` = NULL WHERE `pages`.`id` = 1;



INSERT INTO services VALUES (1, 'Apple IOS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.','fa-apple', '', ''), (2, 'Design', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.', 'fa-html5', '', ''), (3, 'Concept', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.', 'fa-dropbox', '', ''), (4, 'User Research', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.', 'fa-slack', '', ''), (5, 'User Experience', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.', 'fa-users', '', '')


INSERT INTO peoples VALUES (1, 'Tom Rensed', 'Chief Executive Officer', '<p class="wow fadeInDown delay-03s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>', '/assets/img/team_pic1.jpg', '', '', ''), (2, 'Kathren Mory', 'Vice President', '<p class="wow fadeInDown delay-06s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>', '/assets/img/team_pic2.jpg', '', '', ''), (3, 'Lancer Jack', 'Senior Manager', '<p class="wow fadeInDown delay-09s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>', '/assets/img/team_pic3.jpg', '', '', '')

INSERT INTO services VALUES 
(1, 'Apple IOS', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.','fa-apple', '', ''),
(2, 'Design', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.', 'fa-html5', '', ''),
(3, 'Concept', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.', 'fa-dropbox', '', ''),
(4, 'User Research', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.', 'fa-slack', '', ''),
(5, 'User Experience', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text.', 'fa-users', '', '');



INSERT INTO portfolios VALUES 
(1, 'Android', 'android', 'portfolio_pic8.jpg', '','', ''),
(2, 'Nexus Phone', 'web', 'portfolio_pic7.jpg', '','', ''),
(3, 'iPhone', 'web', 'portfolio_pic6.jpg', '', '',''),
(4, 'Managment', 'designe', 'portfolio_pic5.jpg', '', '',''),
(5, 'Shopping', '', 'portfolio_pic4.jpg', '', '',''),
(6, 'GPS Concept', 'designe', 'portfolio_pic3.jpg', '','', ''),
(7, 'Finance App', 'designe', 'portfolio_pic2.jpg', '','', ''),
(8, 'SMS Mobile App', 'appleOS', 'portfolio_pic1.jpg', '','', '');

INSERT INTO peoples VALUES 
(1, 'Tom Rensed', 'Chief Executive Officer', '<p class="wow fadeInDown delay-03s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>', '/assets/img/team_pic1.jpg', '', '', ''),
(2, 'Kathren Mory', 'Vice President', '<p class="wow fadeInDown delay-06s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>', '/assets/img/team_pic2.jpg', '', '', ''),
(3, 'Lancer Jack', 'Senior Manager', '<p class="wow fadeInDown delay-09s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>', '/assets/img/team_pic3.jpg', '', '', '');

INSERT INTO pages(id, name, alias, text, images ) VALUES 
(1, 'Home', 'home', '<h2>We create <strong>awesome</strong> web templates</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text  printer took a galley of type and scrambled it to make a type specimen.</p>', '/assets/img/main_device_image.png'),
(2, 'About us', 'aboutus', '<h3>Lorem Ipsum has been the industry's standard dummy text ever..</h3><br/> 
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.PageMaker including versions of Lorem Ipsum.</p> <br/>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged like Aldus PageMaker including versions of Lorem Ipsum.</p>', '/assets/img/about-ing.png'),
(3, 'Clients', 'clients', '<h2>We create <strong>awesome</strong> web templates</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text  printer took a galley of type and scrambled it to make a type specimen.</p>', 'main_device_image.png'),
(4, 'Contact', 'contact', '<h4>UNIQUE Infoway</h4>
                                <p>104, Some street, NewYork, USA</p>
                            </div>
                            <div class="detail">
                                <h4>call us</h4>
                                <p>+1 234 567890</p>
                            </div>
                            <div class="detail">
                                <h4>Email us</h4>
                                <p>support@sitename.com</p>', '');

UNIQUE – is a modern, elegant and clean one page html5 template built with valid HTML5 & CSS3. It's based on latest Bootstrap framework 3.3.1 fully responsive web compatible with multi browser and devices. This template can be used for multi-purpose needs like business, consultancy, agency, personal portfolio, profile, mobile website and startup company.

Key features
-------------
Twitter Bootstrap 3.3.1
Clean & Developer-friendly HTML5 and CSS3 code
100% Responsive Layout Design
One Page
Multipurpose theme
Google Fonts Support
Font Awesome 
Smooth Scrolling 
Fully Customizable
Contact Form


Credits :
-------
=> Design and developed: "WebThemez"  http://webthemez.com
=> Photos used in template: **Unsplash** - http://unsplash.com
=> For more free web themes: http://webthemez.com
=> Framework : http://getbootstrap.com

License :
-------
**Creative Commons Attribution 3.0** - http://creativecommons.org/licenses/by/3.0/
