# Kumpulan Snippets

## AIOM & Assets
```
    <div class="logo"><img src="{$config->urls->templates}images/LOGO.svg" alt=""></div>
    div class="iconbox-media"  data-menuanchor="section-1"><a href="#section-2"><img src="{$config->urls->templates}images/icon-1.svg" alt="" class="iconbox-media-img iconbox-media-img-lg"></a>

```

## _init.php
```
    // get six random photos from a random gallery
    $view->set('gallery_photos', getRandomGalleryPhotos(6));

    // builds a menu for the footer
    $view->set('footer_menu', getFooterMenu());

    // get six random photos from a random gallery
    $view->set('gallery_photos', getRandomGalleryPhotos(6));

    // builds a menu for the footer
    $view->set('footer_menu', getFooterMenu());

    // $view->set('our_experiences', getCardExperinces());
    // $view->set('our_services', getCardServices());
```
## _home.php
```
    // $view->set('footer_menu', getFooterMenu());

    include_once(__DIR__ . '/include/form/ContactForm.php');

    $contactForm = new ContactForm();
    $form = $contactForm->buildForm();

    // if the form was submitted we process the form
    if($input->post->submit) {

        // process the form and check for errors
        $form->processInput($input->post);

        // // check honeytrap
        // if($form->get("hp_email")->value != "") {
        //     die('Spam!');
        // }

        // if there are errors
        if($form->getErrors()) {
            $view->set('errors', $form->getErrors());

            $view->set('contactform', $form);
        } else {
            if($contactForm->sendMail($input->post)) {
                $view->set("success", __("Your message has been sent."));
            } else {
                $view->set("errors", array(__("There has been an error during the sending process.")));
            }
        }
    } else {
        // pass the empty form to the view
        $view->set("contactform", $form);
    }
```

###
```
    <?php

    class ContactForm 
    {
        var $form;

        var $to = 'destination@email.com';
        var $toName = 'Destination Name';

        public function __construct() 
        {
            $this->templates = wire('templates');
            $this->input = wire('input');
            $this->sanitizer = wire('sanitizer');
            $this->pages = wire('pages');
            $this->modules = wire('modules');
        }

        /**
        * Build the Contact Form
        */
        public function buildForm() 
        {
            $form = $this->modules->get("InputfieldForm");
            
            // Set the Form markup matching Bootstrap framework
            // We don't use labels, we just relies on the placeholder
            
            $form->setMarkup([
                'list' => "{out}",
                'item' => "\n\t<div class='form-group' {attrs}>\n{out}\n\t</div>",
                'item_label' => "",
            ]);

            $form->method = "POST";
            $form->action = "./";
            $form->class = "form";

            // Name field
            $singleField = $this->modules->get('InputfieldText');
            $singleField->attr('id+name', 'name');
            $singleField->attr('class','form-control');
            $singleField->placeholder = __("Name");
            $singleField->required = true;

            $form->add($singleField);

            // Email field
            $singleField = $this->modules->get("InputfieldEmail");
            $singleField->attr('id+name','email');
            $singleField->attr('class','form-control');
            $singleField->placeholder = "Email";
            $singleField->required = true;

            $form->add($singleField);
            
            // // HONEYPOT email field
            // $honeyField = $this->modules->get("InputfieldEmail");
            // $honeyField->label = "Anti-Spam field! Dear screenreader user. Please leave this field out since it serves as spam detection.";
            // $honeyField->attr('placeholder', 'Leave this field empty! Spam-protection!');
            // $honeyField->attr('id+name','hp_email');
            // $honeyField->required = 0;

            // $form->add($honeyField);

            // Subject
            $singleField = $this->modules->get('InputfieldText');
            $singleField->attr('id+name', 'subject');
            $singleField->attr('class','form-control');
            $singleField->placeholder = __("Subject");
            $singleField->required = true;

            $form->add($singleField);

            // Message
            $singleField = $this->modules->get('InputfieldTextarea');
            $singleField->attr('id+name', 'message');
            $singleField->attr('class','form-control');
            $singleField->placeholder = __("Message");
            $singleField->required = true;

            $form->add($singleField);

            // Submit button
            $submit = $this->modules->get("InputfieldSubmit");
            $submit->name = "submit";
            $submit->value = __("Send");
            $submit->attr('class','btn btn-info');

            $form->add($submit);

            return $form;
        }

        /**
        * Send the email
        */
        public function sendMail($input) 
        {
            $wireMail = new WireMail();
            $wireMail->to($this->to);
            $wireMail->from($input['email']);
            $wireMail->toName($this->toName);
            $wireMail->fromName($input['name']);
            $wireMail->subject($input['subject']);
            $wireMail->body($input['message']);
            $numSent = $wireMail->send();

            if ($numSent > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
```
## Package
```
    composer require czubehead/bootstrap-4-forms --prefer-dist -vvv
    composer require nesbot/carbon --prefer-dist -vvv
    composer require gregwar/captcha --prefer-dist -vvv
```