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
            ['JBZoo', 'Toolbox-CI'],
            ['JBZoo', 'Toolbox-Dev'],
            ['JBZoo', 'Skeleton-PHP'],
        ]
    ];

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
                    $this->buildStatusBadges()
                ];
            }

            $result[] = $table->render(['Project', 'Info'], $rows);
            $result[] = '';
            $result[] = '';
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
            str_replace('?branch=master', '', $this->checkBadgeTravis()),
            $this->checkBadgeCoveralls(),
            $this->checkBadgePsalmCoverage(),
            $this->checkBadgeLatestStableVersion(),
            $this->checkBadgeGithubStars(),
            $this->checkBadgeTotalDownloads(),
        ]);
    }

    public function testReadmeHeader(): void
    {
        skip('');
    }
}
