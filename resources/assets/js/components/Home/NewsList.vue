<template>
    <div>
        <v-toolbar color="pink">
            <v-toolbar-title class="white--text">
                NEWS
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon><v-icon>search</v-icon></v-btn>
        </v-toolbar>
        <v-card>
            <v-container fluid style="min-height: 0;" class="" grid-list-kg>
                <v-layout row wrap>
                    <v-flex xs12 v-for="news in getNews" :key="news.id" class="mt-3">
                        <v-card color="blue-grey darken-2" class="white--text">
                            <v-card-title primary-title>
                                <div>
                                    <div class="headline">{{ news.title }}</div>
                                    <div>{{ news.content }}</div>
                                    <span class="grey--text">{{ formatDate( news.created_at ) }}</span>
                                </div>
                            </v-card-title>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-card>
    </div>
    
</template>

<script>
export default {
  computed: {
    getNews() {
      console.log(this.$store);
      return this.$store.state.news;
    }
  },
  methods: {
    formatDate(date) {
      var options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric"
      };
      return new Date(date).toLocaleDateString("de-DE", options);
    }
  }
};
</script>

