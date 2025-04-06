<script setup lang="ts">
import AppContent from '@/123/components/AppContent.vue';
import AppHeader from '@/123/components/AppHeader.vue';
import AppShell from '@/123/components/AppShell.vue';
import type { BreadcrumbItemType } from '@/123/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppShell class="flex-col">
        <AppHeader :breadcrumbs="breadcrumbs" />
        <AppContent>
            <slot />
        </AppContent>
    </AppShell>
</template>
