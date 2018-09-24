/**
 * Part of earth project.
 *
 * @copyright  Copyright (C) 2018 ${ORGANIZATION}.
 * @license    __LICENSE__
 */

$(() => {
  Phoenix.data('component:addon', {
    name: 'addon',
    template: '#addon-component-tmpl',

    data() {
      return {
        options: {}
      }
    },

    props: {
      content: Object,
      column: Object,
      index: Number
    },

    created() {
      this.options = this.content.options;
    },

    methods: {
      edit() {
        Phoenix.trigger('addon:edit', this.content, this.column);
      },

      toggleDisabled() {
        this.content.disabled = !this.content.disabled;
      },

      copy() {
        this.$emit('copy');
      },

      remove() {
        Phoenix.confirm('確定要刪除嗎?')
          .then(() => this.$emit('delete'));
      },

      addAddon() {
        Phoenix.trigger('addon:add', this.content);
      },

      deleteAddon(i) {
        this.addons.splice(i, 1);
      }
    },

    watch: {
      content: {
        handler() {
          this.options = this.content.options;
        },
        deep: true
      }
    },

    computed: {

    }
  });
});