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

namespace JBZoo\PHPUnit;

/**
 * Class SmetDenisReadmeTest
 *
 * @package JBZoo\PHPUnit
 */
class SmetDenisReadmeTest extends AbstractReadmeTest
{
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
            ['JBZoo', 'SimpleTypes'],
            ['JBZoo', 'Toolbox'],
        ],
        'Developer Tools' => [
            ['JBZoo', 'Composer-Diff'],
            ['JBZoo', 'Composer-Graph'],
            ['JBZoo', 'Codestyle'],
            ['JBZoo', 'PHPUnit'],
            ['JBZoo', 'Toolbox-Dev'],
            ['JBZoo', 'Skeleton-PHP'],
        ]
    ];

    public function testDashBoardTable()
    {
        $result = [];

        foreach ($this->projects as $group => $projects) {
            $result[] = "#### {$group}";
            $result[] = "";

            $rows = [];

            $table = new Markdown();
            foreach ($projects as $project) {
                [$vendor, $name] = $project;

                $this->vendorName = $vendor;
                $this->packageName = $name;

                $rows[] = [
                    $this->getGithubLink($vendor, $name),
                    $this->buildStatusBadges(),
                    $this->buildInfoBadges(),
                ];
            }

            $result[] = $table->render(['Project', 'Status', 'Info'], $rows);
        }

        $expected = implode("\n", $result);
        isTrue(strpos(self::getReadme(), $expected) === 0, $expected);
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
            str_replace('?branch=master', '', $this->checkBadgeTravis()),
            $this->checkBadgeCoveralls(),
            $this->checkBadgePsalmCoverage(),
        ]);
    }

    /**
     * @return string
     */
    private function buildInfoBadges(): string
    {
        return implode('    ', [
            $this->checkBadgeLatestStableVersion(),
            $this->checkBadgeGithubForks(),
            $this->checkBadgeGithubStars(),
            $this->checkBadgeTotalDownloads(),
        ]);
    }

    public function testReadmeHeader(): void
    {
        skip('');
    }
}
