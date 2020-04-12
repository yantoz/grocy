### New feature: Price history per store
- Define stores under master data
- New product option to set the default store
- Track on purchase/inventory in which store you bought the product (gets prefilled by the last store you purchased the product, or the default store of the product if you never bought it)
- => The price history chart on the product card shows a line per store
- (Thanks @immae and @kriddles)

### Stock improvements/fixes
- When creating a new product, the "QU id stock" is now preset by the "QU id purchase" (because most of the time that's most probably the same) (thanks @Mik-)
- Clarified the row-button colors and toolips on the stock entries page
- Fixed the conversion factor hint to display also decimal places on the purchase page (only displayed when the product has a different purchase/stock quantity unit)
- Fixed that the stock entries page was broken when there were product userfields defined with enabled "Show as column in tables"
- Fixed that best before dates were displayed on the stock overview and stock entries page even with disabled `GROCY_FEATURE_FLAG_STOCK_BEST_BEFORE_DATE_TRACKING`

### Shopping list fixes
- Fixed that the "shopping list to stock workflow"-dialog was not visible in compact view

### Recipe fixes
- Fixed that when editing an ingredient with "Only check if a single unit is in stock" set, the quantity unit was always set to the products stock quantity unit regardless if a different one was selected for that ingredient
- Fixed a PHP notice on the recipes page when there are no recipes (thanks @mrunkel)

### Calendar fixes
- Fixed that the "Share/Integrate calendar (iCal)" button did not work (thanks @tsia)

### API improvements
- The endpoint `/stock/products/{productId}/locations` now also returns the current stock amount of the product in that loctation (new field/property `amount`) (thanks @Forceu)

### General & other improvements
- New `config.php` setting `FEATURE_FLAG_STOCK_BEST_BEFORE_DATE_FIELD_NUMBER_PAD` which activates the number pad for best-before-date fields on (supported) mobile browsers (useful because of [shorthands](https://github.com/grocy/grocy#input-shorthands-for-date-fields)) (defaults to `true`) (thanks @Mik-)
- Enhancements for the camera barcode scanner (thanks @Mik-)
  - The light button only displayed when the device has a flash light
  - New `config.php` setting `FEATURE_FLAG_AUTO_TORCH_ON_WITH_CAMERA` to always enable the flash light automatically
  - Various display/CSS improvements
- Prerequisites (PHP extensions, critical files/folders) will now be checked and properly reported if there are problems (thanks @Forceu)
- Improved the the overview pages on mobile devices (main column was hidden) (thanks @Mik-)
- Optimized the handling of settings provided by `data/settingoverrides` files (thanks @dacto)
- Optimized the update script (`update.sh`) to create the backup tar archive before writing to it (was a problem on Btrfs file systems) (thanks @shane-kerr)
- New translations: (thanks all the translators)
  - Japanese (demo available at https://ja.demo.grocy.info)
  - Chinese (Taiwan) (demo available at https://zh-tw.demo.grocy.info)