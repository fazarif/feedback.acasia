<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ContactEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:contact';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Contact Us Email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $mail_data = array(

            'races' => $races,
            'count' => $count,
            'count2' => $count2,
            'package1' => $package1,
            'dayStart' => $dayStart,
            'dayEnd' => $dayEnd,
            'todayNow' => $todayNow,
        );

        $from     = 'web@acasia-digital.com';
        $fromName = 'ACASIA Web';
        $to       = 'zarif@acasia.net'; // letak HR maybe
        $title    = 'Contact Us Email';

        Mail::send(['html' => 'email.contactmail'], $mail_data, function($message) use ($from,$fromName,$to,$title){
            $message->to($to)
            ->from($from,$fromName)
            ->subject($title);
        });

        $this->info('Contact Us Command Run successfully');
    }
}
