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
use function JBZoo\PHPUnit\skip;

final class SmetDenisPackageTest extends \JBZoo\Codestyle\PHPUnit\AbstractPackageTest
{
    protected string $packageName         = 'Readme';
    protected string $vendorName          = 'SmetDenis';
    protected string $copyrightVendorName = 'SmetDenis';
    protected array  $packageDesc         = ['Denis Smetannikov - Personal Dashboard on GitHub.'];
    protected string $copyrightSee        = 'https://github.com/SmetDenis';
    protected string $copyrightRights     = 'SmetDenis/Readme. All rights reserved.';

    /** @var string[][][] */
    protected $projects = [
        'PHP Libraries'   => [
            ['JBZoo', 'Utils'],
            ['JBZoo', 'Data'],
            ['JBZoo', 'Image'],
            ['JBZoo', 'Event'],
            ['JBZoo', 'Http-Client'],
            ['JBZoo', 'Assets'],
            ['JBZoo', 'Less'],
            ['JBZoo', 'Path'],
            ['JBZoo', 'Mermaid-PHP'],
            ['JBZoo', 'Retry'],
            ['JBZoo', 'SimpleTypes'],
            ['JBZoo', 'Cli'],
            ['JBZoo', 'Markdown'],
            ['JBZoo', 'Toolbox'],
        ],
        'Developer Tools' => [
            ['JBZoo', 'CI-Report-Converter'],
            ['JBZoo', 'Composer-Diff'],
            ['JBZoo', 'Composer-Graph'],
            ['JBZoo', 'Mock-Server'],
            ['JBZoo', 'Codestyle'],
            ['JBZoo', 'PHPUnit'],
            ['JBZoo', 'Toolbox-Dev'],
            ['JBZoo', 'Skeleton-PHP'],
        ],
    ];

    public function testReadmeHeader(): void
    {
        skip('No need');
    }

    public function testDashBoardByLines(): void
    {
        skip('No need');
        $result = [];

        foreach ($this->projects as $group => $projects) {
            $result[] = "### {$group}";
            $result[] = '';

            $rows = [];

            foreach ($projects as $project) {
                [$vendor, $name] = $project;

                $this->vendorName = $vendor;
                $this->packageName = $name;

                $rows[] = \implode("\n", [
                    $this->getGithubLink($vendor, $name) . '  ' . $this->buildStatusBadges(),
                    '',
                    '',
                ]);
            }

            $result[] = \implode("\n", $rows);
            $result[] = '----';
        }

        $expected = \implode("\n", $result);
        isTrue(\str_contains(self::getReadme(), $expected), $expected);
    }

    public function testDashBoardTable(): void
    {
        $result = [];

        foreach ($this->projects as $group => $projects) {
            $result[] = "#### {$group}";
            $result[] = '';

            $rows = [];

            $table = new Table();

            foreach ($projects as $project) {
                [$vendor, $name] = $project;

                $this->vendorName = $vendor;
                $this->packageName = $name;

                $rows[] = [
                    $this->getGithubLink($vendor, $name),
                    $this->buildStatusBadges(),
                ];
            }

            $result[] = $table
                ->setHeaders(['Project', 'Info'])
                ->appendRows($rows)
                ->render();
            $result[] = '';
            $result[] = '';
        }

        $expected = \implode("\n", $result);
        isTrue(\str_contains(self::getReadme(), $expected), $expected);
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
                $this->checkBadgePackagistLatestStableVersion(),
                $this->checkBadgeGithubActions(),
                $this->checkBadgeCoveralls(),
                $this->checkBadgePsalmCoverage(),
                $this->checkBadgeGithubStars(),
                $this->checkBadgePackagistDownloadsTotal(),
                //$this->checkBadgeGithubForks(),
                //$this->checkBadgeGithubIssues(),
            ]),
        );
    }
}
