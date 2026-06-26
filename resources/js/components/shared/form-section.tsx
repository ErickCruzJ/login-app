interface Props{
    title: string;
    description?: string;
    children: React.ReactNode;
}

export default function FormSection({
    title,
    description,
    children,
}: Props){
    return(
        <div className="border rounded-lg p-4 space-y-3 bg-background">
            <div>
                <h2 className="tstx-lg font-semibold">
                    {title}
                </h2>
                {description &&(
                    <p className="text-sm text-muted-foreground">
                        {description}
                    </p>
                )}
            </div>
            <div className="space-y-4">
                {children}
            </div>
        </div>
    );
}