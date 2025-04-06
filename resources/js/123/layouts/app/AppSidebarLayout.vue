<script setup lang="ts">
import AppContent from '@/123/components/AppContent.vue';
import AppShell from '@/123/components/AppShell.vue';
import AppSidebar from '@/123/components/AppSidebar.vue';
import AppSidebarHeader from '@/123/components/AppSidebarHeader.vue';
import type { BreadcrumbItemType } from '@/123/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppShell variant="sidebar">
        <AppSidebar />
        <AppContent variant="sidebar">
            <AppSidebarHeader :breadcrumbs="breadcrumbs" />
            <slot />
        </AppContent>
    </AppShell>
</template>
