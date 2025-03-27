import AppLogoIcon from './app-logo-icon';

export default function AppLogo() {
    return (
        <>
            <div className="bg-white border border-gray-200 shadow-sm text-sidebar-primary-foreground flex aspect-square size-10 items-center justify-center rounded-md">
                <AppLogoIcon className="size-7 text-white dark:text-black" />
            </div>
            <div className="ml-1 grid flex-1 text-left text-sm">
                <span className="mb-0.5 truncate leading-none font-semibold text-xs">Sistema Administrativo</span>
                <span className="text-[10px] text-gray-500">1.0.0</span>
            </div>
        </>
    );
}
