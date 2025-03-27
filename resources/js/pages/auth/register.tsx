import { Head, useForm } from '@inertiajs/react';
import { LoaderCircle } from 'lucide-react';
import { FormEventHandler, useEffect } from 'react';

import InputError from '@/components/input-error';
import TextLink from '@/components/text-link';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthLayout from '@/layouts/auth-layout';

type RegisterForm = {
    name: string;
    email: string;
    password: string;
    password_confirmation: string;
};

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm<Required<RegisterForm>>({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    // Redireciona para a página de login ao tentar acessar a tela de registro
    useEffect(() => {
        window.location.href = route('login');
    }, []);

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        // Desabilitado - apenas administradores podem registrar usuários
        window.location.href = route('login');
    };

    // Retorna um componente vazio, já que o redirecionamento acontece no useEffect
    return null;
}
