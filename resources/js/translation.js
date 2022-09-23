module.exports = {
    methods: {
        /**
         * Translate the given key.
         */
        __(key, replace = {}) {
            const language = this.$page.props.language;
            const translation = language[key]
                ? language[key]
                : key;

            return Object.keys(replace)
                .reduce(
                    (currentTranslation, key) => currentTranslation.replace(`:${key}`, replace[key]),
                    translation
                )
        },

        /**
         * Translate the given key with basic pluralization.
         */
        __n(key, number, replace = {}) {
            const options = key.split("|");

            key = options[1];

            if (number == 1) {
                key = options[0];
            }

            return tt(key, replace);
        },
    },
};
