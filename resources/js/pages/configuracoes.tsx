import { Head } from '@inertiajs/react';

import AppearanceTabs from '@/components/appearance-tabs';
import HeadingSmall from '@/components/heading-small';
import { type BreadcrumbItem } from '@/types';

import AppLayout from '@/layouts/app-layout';
import SettingsLayout from '@/layouts/settings/layout';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Gerencia',
    href: '/gerencia',
  },
  {
    title: 'Configurações',
    href: '/gerencia/configuracoes',
  },
];

export default function Configuracoes() {
  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title="Configurações - BM3 Imóveis" />

      <SettingsLayout>
        <div className="space-y-6">
          <HeadingSmall
            title="Configurações do Sistema"
            description="Atualize as configurações do sistema BM3 Imóveis"
          />
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div className="border p-4 rounded-lg">
              <h3 className="text-lg font-medium mb-4">Aparência</h3>
              <AppearanceTabs />
            </div>
            <div className="border p-4 rounded-lg">
              <h3 className="text-lg font-medium mb-4">Configurações Gerais</h3>
              <div className="space-y-4">
                <div className="grid gap-2">
                  <label className="text-sm font-medium">Nome da Imobiliária</label>
                  <input
                    type="text"
                    className="border rounded p-2"
                    defaultValue="BM3 Imóveis"
                  />
                </div>
                <div className="grid gap-2">
                  <label className="text-sm font-medium">Email de Contato</label>
                  <input
                    type="email"
                    className="border rounded p-2"
                    defaultValue="contato@bm3imoveis.com.br"
                  />
                </div>
                <div className="grid gap-2">
                  <label className="text-sm font-medium">Telefone</label>
                  <input
                    type="text"
                    className="border rounded p-2"
                    defaultValue="(11) 99999-9999"
                  />
                </div>
                <button className="bg-blue-600 text-white px-4 py-2 rounded">
                  Salvar Alterações
                </button>
              </div>
            </div>
          </div>
        </div>
      </SettingsLayout>
    </AppLayout>
  );
} 