#
# SmetDenis - Readme
#
# This file is part of the SmetDenis project.
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.
#
# @package    Readme
# @license    MIT
# @copyright  Copyright (C) Denis Smetannikov, All rights reserved.
# @link       https://github.com/SmetDenis
#


ifneq (, $(wildcard ./vendor/jbzoo/codestyle/src/init.Makefile))
    include ./vendor/jbzoo/codestyle/src/init.Makefile
endif


update: ##@Project Install/Update all 3rd party dependencies
	$(call title,"Install/Update all 3rd party dependencies")
	@echo "Composer flags: $(JBZOO_COMPOSER_UPDATE_FLAGS)"
	@composer update $(JBZOO_COMPOSER_UPDATE_FLAGS)
