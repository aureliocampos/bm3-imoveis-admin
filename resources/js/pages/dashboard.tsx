import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Gerencia',
        href: '/gerencia',
    },
    {
        title: 'Dashboard',
        href: '/gerencia/dashboard',
    }
];

export default function Dashboard() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard - BM3 Imóveis" />
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
                <div className="grid auto-rows-min gap-4 md:grid-cols-3">
                    <div className="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border">
                        <div className="p-4">
                            <h3 className="text-lg font-medium mb-2">Imóveis Cadastrados</h3>
                            <p className="text-2xl font-bold">32</p>
                        </div>
                        <PlaceholderPattern className="hidden absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
                    </div>
                    <div className="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border">
                        <div className="p-4">
                            <h3 className="text-lg font-medium mb-2">Imóveis para Aluguel</h3>
                            <p className="text-2xl font-bold">18</p>
                        </div>
                        <PlaceholderPattern className="hiddenabsolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
                    </div>
                    <div className="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border">
                        <div className="p-4">
                            <h3 className="text-lg font-medium mb-2">Imóveis para Venda</h3>
                            <p className="text-2xl font-bold">14</p>
                        </div>
                        <PlaceholderPattern className="hidden absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
                    </div>
                </div>
                <div className="border-sidebar-border/70 dark:border-sidebar-border relative min-h-[60vh] flex-1 overflow-hidden rounded-xl border md:min-h-min">
                    <div className="p-4">
                        <h2 className="text-xl font-medium mb-4">Atividades Recentes</h2>
                        <div className="space-y-2">
                            <div className="p-3 border rounded-lg">Novo imóvel cadastrado: Apartamento - Centro</div>
                            <div className="p-3 border rounded-lg">Imóvel atualizado: Casa - Jardim América</div>
                            <div className="p-3 border rounded-lg">Nova solicitação de avaliação recebida</div>
                        </div>
                    </div>
                    <PlaceholderPattern className="hidden absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
                </div>
            </div>
        </AppLayout>
    );
}
