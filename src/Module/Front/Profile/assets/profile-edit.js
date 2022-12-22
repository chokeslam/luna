/**
 * Part of starter project.
 *
 * @copyright  Copyright (C) 2021 __ORGANIZATION__.
 * @license    __LICENSE__
 */

import '@main';

u.$ui.bootstrap.tooltip();

const formSelector = '#profile-form';

u.formValidation()
  .then(() => u.$ui.disableOnSubmit(formSelector));
u.form(formSelector).initComponent();
u.$ui.keepAlive(location.href);
