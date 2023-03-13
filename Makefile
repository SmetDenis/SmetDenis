#
# SmetDenis - Readme.
#
# Denis Smetannikov - Personal Dashboard on GitHub.
#
# @license    MIT
# @copyright  SmetDenis/Readme. All rights reserved.
# @see        https://github.com/SmetDenis
#

ifneq (, $(wildcard ./vendor/jbzoo/codestyle/src/init.Makefile))
    include ./vendor/jbzoo/codestyle/src/init.Makefile
endif


update: ##@Project Install/Update all 3rd party dependencies
	$(call title,"Install/Update all 3rd party dependencies")
	@echo "Composer flags: $(JBZOO_COMPOSER_UPDATE_FLAGS)"
	@composer update $(JBZOO_COMPOSER_UPDATE_FLAGS)
