<?php

namespace LiquidLight\DataSanitiser\Service;

use LiquidLight\DataSanitiser\Service\AbstractSanitiser;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\SingletonInterface;

class SanitiserRegistry implements SingletonInterface
{

	/**
	 * locale
	 *
	 * The locale of the randomiser
	 * https://fakerphp.github.io/#localization
	 *
	 * @var string
	 */
	protected $locale;

	/**
	 * __construct
	 *
	 * @param  string $locale
	 * @return void
	 */
	public function __construct(string $locale)
	{
		$this->locale = $locale;
	}

	/**
	 * registerIndexer
	 *
	 * Register a customIndexer & media field
	 *
	 * @param  array<string> $indexers
	 * @return void
	 */
	public function registerSanitiser(...$sanitisers)
	{
		$randomizerSettings = &$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['randomizer'];

		$randomizerSettings['faker.']['locale'] = $this->locale;

		foreach ($sanitisers as $i => $sanitiser) {
			$this->assertAbstractSanitiser($sanitiser);

			$sanitiser = GeneralUtility::makeInstance($sanitiser);
			$table = sprintf('%s.', $sanitiser->getTable());

			$randomizerSettings['faker.']['mapping.'][$table] = $sanitiser->getMapping();
			$randomizerSettings['faker.']['unique.'][$table] = $sanitiser->getUnique();
			$randomizerSettings['equal.'][$table] = $sanitiser->getEqual();
		}

		// Allows us to chain methods
		return $this;
	}

	/**
	 * assertAbstractSanitiser
	 *
	 * @param  string $indexer
	 * @throws Exception If the class is not an AbstractSanitiser
	 * @return void
	 */
	private function assertAbstractSanitiser(string $indexer)
	{
		if (!is_a($indexer, AbstractSanitiser::class, true)) {
			throw new \Exception(
				sprintf('Expected AbstractSanitiser, instead got "%s".', $indexer)
			);
		}
	}
}
