<?php

/**
 * SmetDenis - Readme.
 *
 * Denis Smetannikov - Personal Dashboard on GitHub.
 *
 * @license    MIT
 * @copyright  SmetDenis/Readme. All rights reserved.
 * @see        https://github.com/SmetDenis
 */

declare(strict_types=1);

namespace SmetDenis\PHPUnit;

use JBZoo\Markdown\Table;

use function JBZoo\PHPUnit\isTrue;
use function JBZoo\PHPUnit\success;

final class SmetDenisPackageTest extends \JBZoo\Codestyle\PHPUnit\AbstractPackageTest
{
    protected string $packageName         = 'Readme';
    protected string $vendorName          = 'SmetDenis';
    protected string $copyrightVendorName = 'SmetDenis';
    protected array  $packageDesc         = ['Denis Smetannikov - Personal Dashboard on GitHub.'];
    protected string $copyrightSee        = 'https://github.com/SmetDenis';
    protected string $copyrightRights     = 'SmetDenis/Readme. All rights reserved.';

    /** @var string[][][] */
    protected array $projects = [
        'show' => [
            ['JBZoo', 'CSV-Blueprint'],         //    2* Docker
            ['JBZoo', 'CI-Report-Converter'],   //  708  Docker

            ['JBZoo', 'Composer-Diff'],         //  743
            ['JBZoo', 'Composer-Graph'],        //  709
            ['JBZoo', 'Mermaid-PHP'],           //  760
            ['JBZoo', 'Cli'],                   //  410
            ['JBZoo', 'Utils'],                 // 1200
            ['JBZoo', 'Data'],                  // 1200
            ['JBZoo', 'Event'],                 //  521
            ['JBZoo', 'Retry'],                 //   47
            ['JBZoo', 'Markdown'],              //  772
            ['JBZoo', 'Image'],                 //  108
            ['JBZoo', 'SimpleTypes'],           //    2
            ['JBZoo', 'Http-Client'],           //  143
            ['JBZoo', 'Assets'],                //   52
            ['JBZoo', 'Less'],                  //   90
            ['JBZoo', 'Path'],                  //   91
        ],

        'hide' => [
            ['JBZoo', 'Codestyle'],             //  966
            ['JBZoo', 'PHPUnit'],               //  990
            ['JBZoo', 'Toolbox-Dev'],           //  902
            ['JBZoo', 'Toolbox'],               //    1
            ['JBZoo', 'Skeleton-PHP'],
        ],
    ];

    public function testDashBoardTable(): void
    {
        foreach ($this->projects as $group => $projects) {
            $result = [''];
            if ($group === 'hide') {
                $result[] = '<details>';
                $result[] = '  <summary>CLICK to see my other projects</summary>';
                $result[] = '';
            }

            $rows = [];

            $table = new Table();

            foreach ($projects as $project) {
                [$vendor, $name] = $project;

                $this->vendorName  = $vendor;
                $this->packageName = $name;

                $rows[] = [
                    $this->getGithubLink($vendor, $name),
                    $this->buildStatusBadges(),
                ];
            }

            $result[] = $table->setHeaders(['Project', 'Info'])->appendRows($rows)->render();

            if ($group === 'hide') {
                $result[] = '';
                $result[] = '</details>';
            }

            $expected = \implode("\n", $result);
            isTrue(\str_contains(self::getReadme(), $expected), $expected);
        }
    }

    public function testReadmeHeader(): void
    {
        success('Skipped');
    }

    protected function checkBadgeGithubStars(): string
    {
        return $this->getBadge(
            'GitHub Stars',
            'https://img.shields.io/github/stars/__VENDOR__/__PACKAGE__?style=flat',
            'https://github.com/__VENDOR_ORIG__/__PACKAGE_ORIG__/stargazers',
        );
    }

    protected function checkBadgeGithubLatestRelease(): string
    {
        return $this->getBadge(
            'GitHub Release',
            'https://img.shields.io/github/v/release/__VENDOR__/__PACKAGE__?label=Latest',
            'https://github.com/__VENDOR__/__PACKAGE__/releases',
        );
    }

    protected function checkBadgeDockerPulls(): string
    {
        if ($this->packageName === 'CSV-Blueprint'
            || $this->packageName === 'CI-Report-Converter'
        ) {
            return $this->getBadge(
                'Docker Pulls',
                'https://img.shields.io/docker/pulls/__VENDOR__/__PACKAGE__.svg',
                'https://hub.docker.com/r/__VENDOR__/__PACKAGE__/tags',
            );
        }

        return '';
    }

    private function getGithubLink(string $vendor, string $name): string
    {
        return "[{$name}](https://github.com/{$vendor}/{$name})";
    }

    private function buildStatusBadges(): string
    {
        return \implode(
            '    ',
            \array_filter([
                $this->checkBadgeGithubActions(),
                $this->checkBadgeGithubStars(),
                $this->checkBadgePackagistDownloadsTotal(),
                $this->checkBadgeDockerPulls(),
            ]),
        );
    }
}
