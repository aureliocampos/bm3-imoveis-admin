import { ImgHTMLAttributes } from 'react';

export default function AppLogoIcon(props: ImgHTMLAttributes<HTMLImageElement>) {
    return (
        <figure>
            <img src="https://bm3imoveis.com.br/wp-content/uploads/2024/12/cropped-favicon-270x270.png" alt="BM3 Imóveis" width={32} height={32} {...props} />
        </figure>
    );
}
