/**
 * Part of earth project.
 *
 * @copyright  Copyright (C) 2022 __ORGANIZATION__.
 * @license    __LICENSE__
 */

export default class BsTooltip {
  static install(app) {
    app.directive('tooltip', {
      mounted(el, { value }) {
        value = value || {};
        value.container = 'body';

        const tooltip = u.$ui.bootstrap.tooltip(el, value);
      },
      beforeUpdated(el) {
        const tooltip = u.$ui.bootstrap.tooltip(el);

        tooltip.dispose();
        tooltip.enable();
      }
    });
  }
}
