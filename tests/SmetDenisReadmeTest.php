<?php

/**
 * SmetDenis - Readme
 *
 * This file is part of the SmetDenis project.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package    Readme
 * @license    MIT
 * @copyright  Copyright (C) Denis Smetannikov, All rights reserved.
 * @link       https://github.com/SmetDenis
 */

declare(strict_types=1);

namespace JBZoo\PHPUnit;

use JBZoo\Markdown\Table;

/**
 * Class SmetDenisReadmeTest
 *
 * @package JBZoo\PHPUnit
 */
class SmetDenisReadmeTest extends AbstractReadmeTest
{
    /**
     * @var string
     */
    protected $vendorName = 'SmetDenis';

    /**
     * @var string
     */
    protected $packageName = 'SmetDenis';

    /**
     * @var string[]
     */
    protected $badgesTemplate = [
        'github_actions',
    ];

    /**
     * @var string[][][]
     */
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
        ]
    ];

    /**
     * @var bool[]
     */
    protected $params = [
        'latest_stable_version'   => true,
        'latest_unstable_version' => true,
        'version'                 => true,
        'total_downloads'         => true,
        'dependents'              => true,
        'suggesters'              => true,
        'daily_downloads'         => true,
        'monthly_downloads'       => true,
        'composerlock'            => true,
        'gitattributes'           => true,
        'packagist_license'       => true,
        'github_issues'           => true,
        'github_license'          => true,
        'github_forks'            => true,
        'github_stars'            => true,
        'codacy'                  => true,
        'psalm_coverage'          => true,
        'travis'                  => true,
        'coveralls'               => true,
        'circle_ci'               => true,
        'strict_types'            => true,
        'scrutinizer'             => true,
        'github_actions'          => true,
    ];

    /**
     * @return string
     */
    protected function getTitle(): string
    {
        return '';
    }

    public function testDashBoardTable(): void
    {
        skip('disabled');
        $result = [];

        foreach ($this->projects as $group => $projects) {
            $result[] = "#### {$group}";
            $result[] = "";

            $rows = [];

            $table = new Table();
            foreach ($projects as $project) {
                [$vendor, $name] = $project;

                $this->vendorName = $vendor;
                $this->packageName = $name;

                $rows[] = [
                    $this->getGithubLink($vendor, $name),
                    $this->buildStatusBadges()
                ];
            }

            $result[] = $table
                ->setHeaders(['Project', 'Info'])
                ->appendRows($rows)
                ->render();
            $result[] = '';
            $result[] = '';
        }

        $expected = implode("\n", $result);
        isTrue($expected); // deprecated placeholder
        isTrue(strpos(self::getReadme(), $expected) !== false, $expected);
    }

    public function testDashBoardByLines(): void
    {
        //skip('disabled');
        $result = [];

        foreach ($this->projects as $group => $projects) {
            $result[] = "### {$group}";
            $result[] = "";

            $rows = [];

            foreach ($projects as $project) {
                [$vendor, $name] = $project;

                $this->vendorName = $vendor;
                $this->packageName = $name;

                $rows[] = implode("\n", [
                    $this->getGithubLink($vendor, $name),
                    '',
                    $this->buildStatusBadges(),
                    '',
                    ''
                ]);
            }

            $result[] = implode("\n", $rows);
            $result[] = '----';
        }

        $expected = implode("\n", $result);
        isTrue(strpos(self::getReadme(), $expected) !== false, $expected);
    }

    /**
     * @param string $vendor
     * @param string $name
     * @return string
     */
    private function getGithubLink(string $vendor, string $name): string
    {
        return "[{$vendor}/{$name}](https://github.com/{$vendor}/{$name})";
    }

    /**
     * @return string
     */
    private function buildStatusBadges(): string
    {
        return implode('    ', [
            $this->checkBadgeLatestStableVersion(),
            $this->checkBadgeGithubActions(),
            $this->checkBadgeCoveralls(),
            $this->checkBadgePsalmCoverage(),
            $this->checkBadgeGithubStars(),
            $this->checkBadgeTotalDownloads(),
            $this->checkBadgeGithubIssues(),
        ]);
    }

    /**
     * @return string|null
     */
    protected function checkBadgeGithubActions(): ?string
    {
        return $this->getPreparedBadge($this->getBadge(
            'CI',
            'https://github.com/__VENDOR_ORIG__/__PACKAGE_ORIG__/actions/workflows/main.yml/badge.svg?branch=master',
            'https://github.com/__VENDOR_ORIG__/__PACKAGE_ORIG__/actions/workflows/main.yml?query=branch%3Amaster'
        ));
    }

    /**
     * @return string|null
     */
    protected function checkBadgeCoveralls(): ?string
    {
        return $this->getPreparedBadge($this->getBadge(
            'Coverage Status',
            'https://coveralls.io/repos/__VENDOR_ORIG__/__PACKAGE_ORIG__/badge.svg?branch=master',
            'https://coveralls.io/github/__VENDOR_ORIG__/__PACKAGE_ORIG__?branch=master'
        ));
    }
}
