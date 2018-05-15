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
            <v-container fluid style="min-height: 0;" grid-list-kg>
                <v-layout row wrap>
                    <v-flex xs12 v-for="news in getNews" :key="news.id">
                        <v-card color="blue-grey darken-2" class="white--text">
                            <v-card-title primary-title>
                                <div class="headline">{{ news.content }}</div>
                            </v-card-title>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-card>
    </div>
    
</template>

<script>
export default {};
</script>

