<?php

namespace Mmeyer2k\LaravelMailFile;

use Carbon\Carbon;
use Illuminate\Mail\Transport\Transport;
use Swift_Mime_SimpleMessage;
use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\RawMessage;

class MailFileDriver implements TransportInterface
{
    /**
     * {@inheritdoc}
     *
     * @return int
     */
	public function send(RawMessage $message, Envelope $envelope = null): ?SentMessage
    {
        $time = Carbon::now()->format('Y-m-d_H-i-s_u');

        $base = env('MAIL_FILE_PATH') ?? sys_get_temp_dir();

	    if (!file_exists($base))
		    mkdir($base, 0777, true);
		
        $file = "$base/$time.eml";

        file_put_contents($file, $message->toString());

	    return new SentMessage($message, $envelope ?? Envelope::create($message));
    }
	

	public function __toString(): string {
		return 'file';
	}


}
