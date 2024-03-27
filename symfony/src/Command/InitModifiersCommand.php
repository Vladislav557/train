<?php

namespace App\Command;

use App\Entity\AgeModifier;
use App\Entity\PaymentPeriodModifier;
use App\Repository\AgeModifierRepository;
use App\Repository\PaymentPeriodModifierRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Throwable;
use DateTime;

#[AsCommand(
    name: 'app:init-modifiers',
    description: 'Заполнение БД тестовыми модификаторами стоимости',
)]
class InitModifiersCommand extends Command
{
    public function __construct(
        private readonly AgeModifierRepository $ageModifierRepository,
        private readonly PaymentPeriodModifierRepository $periodModifierRepository
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $data = json_decode(file_get_contents(__DIR__ . '/../Repository/Fixtures/data.json'), 1);
            $this->fillDatabase($data);
            $io->success('Success database filled');
            return Command::SUCCESS;
        } catch (Throwable $throwable) {
            $io->error($throwable->getMessage());
            return Command::FAILURE;
        }
    }

    private function fillDatabase(array $collection): void
    {
        $now = new DateTime();
        foreach ($collection as $modifier) {
            if ($modifier['type'] === 'age') {
                $ageModifier = new AgeModifier();
                $ageModifier
                    ->setCreatedAt($now)
                    ->setDiscountPercent($modifier['discountPercent'])
                    ->setDiscountAbsoluteLimit($modifier['absoluteDiscountLimit'])
                    ->setLowerAgeLimit($modifier['bottomBorder'])
                    ->setUpperAgeLimit($modifier['topBorder']);
                $this->ageModifierRepository->save($ageModifier);
            } else {
                $paymentPeriodModifier = new PaymentPeriodModifier();
                $paymentPeriodModifier
                    ->setCreatedAt($now)
                    ->setDiscountPercent($modifier['discountPercent'])
                    ->setDiscountAbsoluteLimit($modifier['absoluteDiscountLimit'])
                    ->setBookingEnd($modifier['bookingEnd'])
                    ->setBookingStart($modifier['bookingStart'])
                    ->setPaymentDateBorder($modifier['paymentDateBorder']);
            }
        }
    }
}
